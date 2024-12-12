<?php

namespace App\Http\Controllers;

use App\Models\Applier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;

class CompanyController extends Controller
{
    public function signUpPage(){
        return view('company.signUpCompany');
    }

    public function signUp(Request $request){
        $request->validate([
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
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'role' => 'company',
                'profile_picture' => 'default/profile_picture.jpg',
            ]);

            // Membuat company baru
            Company::create([
                'address' => $request->address,
                'field' => $request->field,
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

        return view('company.home', compact('data'));
    }

    public function viewProfile(){
        $company = Auth::user()->company;
        return view('company.companyProfile', compact('company'));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'field' => 'string|max:255',
            'address' => 'string|max:255',
            'description' => 'string',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $company = Auth::user();
        if($request->hasFile('logo')){
            $file = $request->file('profile_picture');
            $destinationPath = public_path('upload/profile_picture');
            $fileName = $company->id . '_profile_picture.' . $request->file('profile_picture')->getClientOriginalExtension();

            if ($company->profile_picture && $company->profile_picture != 'default_profile_picture.jpg' && File::exists(public_path('upload/profile_picture/' . $company->profile_picture))) {
                File::delete(public_path('upload/profile_picture/' . $company->profile_picture));
            }

            $file->move($destinationPath, $fileName);

            $company->profile_picture = $fileName;
        }

        $company->update([
            'name' => $request->name ?? $company->name,
            'phone_number' => $request->phone_number ?? $company->phone_number,
            'profile_picture' => $company->profile_picture,
        ]);

        Company::where('user_id', $company->id)->update([
            'description' => $request->description ?? $company->description,
            'field' => $request->field ?? $company->field,
            'address' => $request->address ?? $company->address,
        ]);

        return redirect()->route('company.profile', compact('company'));
    }

    public function index(){
        $companies = DB::table('companies')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->select('companies.*', 'users.name as user_name', 'users.profile_picture as company_image')
            ->paginate(20);
        return view('user.companies', compact('companies'));
    }

    public function viewCompany($company_id){
        $company = Company::with('user')->findOrFail($company_id);
        $jobs = Job::where('company_id', $company_id)
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        return view('user.company', compact('company', 'jobs'));
    }

    public function searchCompany(Request $request){
        $request->validate([
            'search' => 'string|nullable',
            'filter' => 'string|in:name,field',
        ]);

        $companiesQuery = DB::table('companies')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->select('companies.*', 'users.name as user_name', 'users.profile_picture as company_image');

        if ($request->filled('search')) {
            $companiesQuery->where($request->filter, 'like', '%' . $request->search . '%');
        }

        $companies = $companiesQuery->paginate(12)->withQueryString();
        return view('user.companies', compact('companies'));
    }

    public function viewApplicants(Applier $applier){
        $applier = Applier::where('id', $applier->id)
            ->with('user')
            ->with('educations')
            ->with('experiences')
            ->first();
        return view('user.home', compact( 'applier'));
    }
}
