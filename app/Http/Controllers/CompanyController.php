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
            $req->session()->put('message','Successfully registered');
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
        return view('company.companyProfile');
    }

    public function updateProfile(Request $req){
        $req->validate([
            'name' => 'string|max:255',
            'phone_number' => 'string|max:20',
            'field' => 'string|max:255',
            'address' => 'string|max:255',
            'password' => 'string|min:8',
            'description' => 'string',
            'logo' => 'string|max:255',
        ]);

        $company = Company::findOrFail(session('company_id'));

        $company->update([
            'name' => $req->name ?? $company->name,
            'email' => $req->email ?? $company->email,
            'phone_number' => $req->phone_number ?? $company->phone_number,
            'description' => $req->description ?? $company->description,
            'logo' => $req->logo ?? $company->logo,
            'field' => $req->field ?? $company->field,
            'location' => $req->location ?? $company->location,
            'password' => $req->password ? Hash::make($req->password) : $company->password,
        ]);

        return redirect()->route('company.profile');
    }

    public function index(){
        $companies = Company::paginate(20);
        return view('user.companies', compact('companies'));
    }

    public function viewCompany($company_id){
        $company = Company::with('user')->findOrFail($company_id);
        $jobs = Job::where('company_id', $company_id)->limit(3)->get();
        return view('user.company', compact('company', 'jobs'));
    }

    public function uploadCompanyProfilePicture(Request $req) {
        // Input form with name company_profile_picture must be either jpg, png, or jpeg with maximum size of 2MB
        $req->validate([
            'company_profile_picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Save the photo to storage
        $path = $req->file('company_profile_picture')->store('company_upload/profile_picture');

        $company = Auth::user();
        // Delete old profile picture from folder
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
        ],[
            'filter.in' => 'The selected filter is invalid. Please choose either ' . 'name or field'
        ]);

    // Initialize the query for companies
    $companiesQuery = DB::table('companies')
        ->join('users', 'companies.user_id', '=', 'users.id')
        ->select('companies.*', 'users.name as user_name');

        if ($req->filled('search')) {
            switch ($req->filter) {
                case 'name':
                    $companiesQuery->where('users.name', 'like', '%' . $req->search . '%');
                    break;
                case 'field':
                    $companiesQuery->where('companies.field', 'like', '%' . $req->search . '%');
                    break;
                default:
                    break;
            }
        }

        $companies = $companiesQuery->paginate(12)->withQueryString();
        return view('user.companies', compact('companies'));
    }
}
