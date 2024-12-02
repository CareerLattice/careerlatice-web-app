<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;

class CompanyController extends Controller
{
    public function signUpPage(){
        return view('company.signUpCompany');
    }

    public function signUp(Request $req){
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'phone_number' => 'string|max:20',
            'address' => 'string|max:100',
            'field' => 'string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $company = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'phone_number' => $req->phone_number,
                'role' => 'company',
            ]);

            // Membuat company baru
            Company::create([
                'address' => $req->address,
                'field' => $req->field,
                'user_id' => $company->id,
            ]);

            DB::commit();
            session()->put('message','Successfully registered');
            return redirect()->route('login');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Please try again later.']);
        }
    }

    public function viewHome(){
        $activeJobs = DB::table('job_vacancies')
            ->where('company_id', Auth::user()->company->id)
            ->where('is_active', true)
            ->count();

        $totalApplicant = DB::table('job_applications')
            ->join('job_vacancies', 'job_applications.job_id', '=', 'job_vacancies.id')
            ->where('company_id', Auth::user()->company->id)
            ->count();

        $monthApplication = DB::table('job_applications')
            ->join('job_vacancies', 'job_applications.job_id', '=', 'job_vacancies.id')
            ->where('company_id', Auth::user()->company->id)
            ->whereMonth('job_applications.created_at', now()->month)
            ->count();

        $recentCreatedJob = Job::with('applicants')->where('company_id', Auth::user()->company->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $data = [
            'active_jobs' => $activeJobs,
            'total_applicant' => $totalApplicant,
            'month_application' => $monthApplication,
            'recent_job' => $recentCreatedJob,
        ];

        return view('company.companyHome', compact('data'));
    }

    public function viewProfile(){
        $company = Auth::user()->company;
        return view('company.companyProfile', compact('company'));
    }

    public function updateProfile(Request $req){
        $req->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'field' => 'string|max:255',
            'address' => 'string|max:255',
            'description' => 'string',
            'logo' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $company = Auth::user();
        if($req->logo){
            if ($company->profile_picture && Storage::exists($company->profile_picture)) {
                $test = Storage::delete($company->profile_picture);
                dd($test);
            }

            $path = $req->file('logo')->storeAs('company_upload/profile_picture', $company->id . '_profile_picture.' . $req->file('logo')->getClientOriginalExtension(), 'public');
            $company->profile_picture = $path;
        }

        $company->update([
            'name' => $req->name ?? $company->name,
            'phone_number' => $req->phone_number ?? $company->phone_number,
            'profile_picture' => $company->profile_picture,
        ]);

        Company::where('user_id', Auth::id())->update([
            'description' => $req->description ?? $company->description,
            'field' => $req->field ?? $company->field,
            'address' => $req->address ?? $company->address,
        ]);

        $updatedCompany = User::find($company->id);
        Auth::login($updatedCompany);

        return redirect()->route('company.profile', compact('company'));
    }

    public function index(){
        $companies = DB::table('companies')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->select('companies.*', 'users.name as user_name')
            ->paginate(20);
        return view('user.companies', compact('companies'));
    }

    public function viewCompany($company_id){
        $company = Company::with('user')->findOrFail($company_id);
        $jobs = Job::where('company_id', $company_id)->limit(3)->get();
        return view('user.company', compact('company', 'jobs'));
    }

    public function uploadCompanyProfilePicture(Request $req) {
        $req->validate([
            'company_profile_picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $req->file('company_profile_picture')->store('company_upload/profile_picture');

        $company = Auth::user();
        if (Storage::exists($company->profilePicture)) {
            Storage::delete($company->profilePicture);
        }

        User::where('id', $company->id)->update(['profile_picture' => $path]);

        $updatedCompany = User::find($company->id);
        Auth::login($updatedCompany);
        return redirect()->route('company.profile', ['company' => $company]);
    }

    public function searchCompany(Request $req){
        $req->validate([
            'search' => 'string|nullable',
            'filter' => 'string|in:name,field',
        ]);

        $companiesQuery = DB::table('companies')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->select('companies.*', 'users.name as user_name');

        if ($req->filled('search')) {
            $companiesQuery->where($req->filter, 'like', '%' . $req->search . '%');
        }

        $companies = $companiesQuery->paginate(12)->withQueryString();
        return view('user.companies', compact('companies'));
    }
}
