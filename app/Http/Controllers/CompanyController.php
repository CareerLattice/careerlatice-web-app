<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;

class CompanyController extends Controller
{
    public function signUpPage(){
        return view('company.signUpCompany');
    }

    public function signUp(Resquest $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies',
            'password' => 'required|string|min:8',
            'phone_number' => 'string|max:20',
            'description' => 'string',
            'field' => 'string|max:100',
            'address' => 'string|max:100',
            'logo' => 'string|max 255',
        ]);

        $company = new Company([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'description' => $request->description,
            'field' => $request->field,
            'logo' => $request->logo,
        ]);

        $company->save();
        return redirect()->route('company.loginPage');
    }

    public function loginPage(){
        return view('company.loginCompany');
    }

    public function login(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $company = Company::where('email', $req->email)->first();

        if(!$company){
            return redirect()->back()->withErrors(['email' => 'Email unregistered'])->withInput();
        }

        if(!Hash::check($req->password, $company->password)){
            return redirect()->back()->withErrors(['password' => 'Wrong password'])->withInput();
        }

        $req->session()->put('company_id', $company->id);
        return redirect()->route('company.home');
    }

    public function logout(Request $request){
        $request->session()->forget('company_id');
        return redirect()->route('company.loginPage');
    }

    public function viewHome(){
        return view('company.companyHome');
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

    public function getJobs(){
        $id = session('company_id');
        $company = Company::findOrFail($id);
        $jobs = $company->jobs()->paginate(20)->withQueryString();
        return view('company.companyJobs')->with('jobs', $jobs);
    }

    public function index(){
        return Company::paginate(20);
    }

    public function show($id){
        $company = Company::findOrFail($id);
        return $company;
    }

    public function createJob(Request $req){
        $id = session('company_id');
        $req->validate([
            'title' => 'required|string|max:255',
            'job_type' => 'required|in:full_time,part_time,internship',
            'address' => 'required|string|max:255',
            'skill_required' => 'required|string',
            'description' => 'required|string',
            'requirement' => 'required|string',
            'person_in_charge' => 'required|string',
            'contact_person' => 'required|string',
            'is_active' => 'required|boolean',
        ]);

        $job = new Job([
            'company_id' => $id,
            'job_type' => $req->job_type,
            'title' => $req->title,
            'address' => $req->address,
            'skill_required' => $req->skill_required,
            'description' => $req->description,
            'requirement' => $req->requirement,
            'person_in_charge' => $req->person_in_charge,
            'contact_person' => $req->contact_person,
            'is_active' => $req->is_active,
        ]);

        return redirect()->route('company.listJob');
    }

    public function viewJob($id){
        $job = Job::findOrFail($id);
        return view('company.job')->with('job', $job);
    }

    public function updateJob($id){
        $req->validate([
            'title' => 'string|max:255',
            'job_type' => 'in:full_time,part_time,internship',
            'address' => 'string|max:255',
            'skill_required' => 'string',
            'description' => 'string',
            'requirement' => 'string',
            'person_in_charge' => 'string',
            'contact_person' => 'string',
            'is_active' => 'boolean',
        ]);

        $job = Job::findOrFail($id);
        $job->update([
            'job_type' => $req->job_type ?? $job->job_type,
            'title' => $req->title ?? $job->title,
            'address' => $req->address ?? $job->address,
            'skill_required' => $req->skill_required ?? $job->skill_required,
            'description' => $req->description ?? $job->description,
            'requirement' => $req->requirement ?? $job->requirement,
            'person_in_charge' => $req->person_in_charge ?? $job->person_in_charge,
            'contact_person' => $req->contact_person ?? $job->contact_person,
            'is_active' => $req->is_active ?? $job->is_active,
        ]);

        return redirect()->route('company.job', ['id' => $id]);
    }

    public function deleteJob($id){
        $job = Job::findOrFail($id);

        // Soft Delete
        $job->delete();
        return redirect()->route('company.listJob');
    }

    public function viewJobApplicants($id){
        $job = Job::findOrFail($id);
        $applicants = $job->applicants->paginate(25)->withQueryString();
        return view('company.jobApplicants')->with('applicants', $applicants);
    }

    // public function viewApplicant($id){
    //     $user = User::findOrFail($id);
    //     return view('company.applicant')->with('applicant', $user);
    // }

    public function uploadCompanyProfilePicture(Request $request) {
        $request->validate([
            'company_profile_picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $request->file('company_profile_picture')->store('company_upload/profile_picture');
        $company = Company::findOrFail(session('company_id'));

        // Delete old profile picture from folder
        if (Storage::exists($company->profilePicture)) {
            Storage::delete($company->profilePicture);
        }

        $company->profilePicture = $path;
        $company->save();
        return redirect()->route('company.profile')->with('company', $company);
    }

    public function uploadJobPicture(Request $request) {
        $request->validate([
            'job_picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $request->file('job_picture')->store('company_upload/job_picture');
        $id = session($request->id);
        $job = Job::findOrFail($id);

        // Delete old profile picture from folder
        if (Storage::exists($job->job_picture)) {
            Storage::delete($job->job_picture);
        }

        $job->job_picture = $path;
        $job->save();
        return redirect()->route('company.job')->with('id', $id);
    }
}
