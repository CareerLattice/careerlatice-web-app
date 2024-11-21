<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    // Company Section for Job
    // Company can create Job
    public function createJob(){
        return view('company.createJob');
    }

    public function create(Request $req){
        $req->validate([
            'title' => 'required|string|max:255',
            'job_type' => 'required|in:Full Time,Part Time,Internship',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'requirement' => 'required|string',
            'person_in_charge' => 'required|string',
            'contact_person' => 'required|string',
        ]);

        Job::create([
            'title' => $req->title,
            'job_type' => $req->job_type,
            'address' => $req->address,
            'description' => $req->description,
            'requirement' => $req->requirement,
            'person_in_charge' => $req->person_in_charge,
            'contact_person' => $req->contact_person,

            'company_id' => Auth::user()->company->id,
            'is_active' => true,
        ]);

        return redirect()->route('company.listJob');
    }

    public function editJob(Job $job){
        return view('company.editJob', compact('job'));
    }

    // Company can update Job
    public function update(Request $req, Job $job){
        $req->validate([
            'title' => 'required|string|max:255',
            'job_type' => 'required|in:Full Time,Part Time,Internship',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'requirement' => 'required|string',
            'benefit' => 'required|string',
            'person_in_charge' => 'required|string',
            'contact_person' => 'required|string',
            'is_active' => 'required|boolean',
        ]);

        // Update status job application to rejected
        if($req->is_active == 0 && $job->is_active == 1){
            JobApplication::where('job_id', $job->id)->update(['status' => 'rejected']);
        }

        $job->update([
            'title' => $req->title,
            'job_type' => $req->job_type,
            'address' => $req->address,
            'description' => $req->description,
            'requirement' => $req->requirement,
            'benefit' => $req->benefit,
            'person_in_charge' => $req->person_in_charge,
            'contact_person' => $req->contact_person,
            'is_active' => $req->is_active,
        ]);

        return redirect()->route('company.job', compact('job'));
    }

    // Company can view the job vacancies they create
    public function viewJob(Job $job){
        $applicants = DB::table('users')
            ->join('appliers', 'users.id', '=', 'appliers.user_id')
            ->join('job_applications', 'appliers.id', '=', 'job_applications.applier_id')
            ->where('job_applications.job_id', $job->id)
            ->select('users.name', 'appliers.cv_url as cv', 'job_applications.status', 'job_applications.id as job_application_id')
            ->paginate(25);
        return view('company.job', compact('job', 'applicants'));
    }

    // Company can view all job vacancies they create
    public function getJobs(){
        $company = Auth::user()->company;
        $jobs = $company->jobs()->paginate(20)->withQueryString();
        return view('company.listJob', compact('jobs'));
    }

    // Company can delete job vacancies they create
    public function deleteJob(Job $job){
        // Update status job application to rejected
        JobApplication::where('job_id', $job->id)->update(['status' => 'rejected']);

        // Soft Delete the Job
        $job->delete();
        return redirect()->route('company.listJob');
    }

    // Company can upload job picture
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
        return redirect()->route('company.job', ['id' => $id]);
    }

    // User Section for Job
    // User can search job vacancies
    public function searchJobs(Request $req){
        $req->validate([
            'search' => 'string|nullable',
            'filter' => 'string|in:name,job_type,title',
        ]);

        $jobs = DB::table('job_vacancies')
            ->join('companies', 'companies.id', '=', 'job_vacancies.company_id')
            ->join('users','users.id','=','companies.user_id')
            ->where('is_active', true)
            ->select('job_vacancies.*', 'users.name as company_name');

        if ($req->filled('search')) {
            $jobs->where($req->filter, 'like', '%' . $req->search . '%');
        }

        $jobs = $jobs->paginate(3)->withQueryString();
        return view('user.jobs', compact('jobs'));
    }

    public function searchJobsByCompany(Request $req, Company $company){
        $req->validate([
            'search'=> 'string|nullable',
            'filter' => 'string|in:job_type,title',
        ]);

        $jobs = DB::table('job_vacancies')
            ->join('companies', 'companies.id', '=', 'job_vacancies.company_id')
            ->join('users','users.id','=','companies.user_id')
            ->where('is_active', true)
            ->where('company_id', $company->id)
            ->select(
                'job_vacancies.id',
                'job_vacancies.title',
                'job_vacancies.address',
                'job_vacancies.job_type',
                'job_vacancies.description',
                'job_vacancies.is_active',
                DB::raw(value: "DATE_FORMAT(job_vacancies.updated_at, '%d %M %Y') as updated_at"),
                'users.name as company_name');

        if ($req->filled('search')) {
            $jobs->where($req->filter, 'like', '%' . $req->search . '%');
        }

        // dd($jobs);
        $jobs = $jobs->paginate(3)->withQueryString();
        return view('user.companyJobVacancies', compact('jobs', 'company'));
    }

    // Return all job vacancies with pagination 20 per page
    public function index(){
        $jobs = DB::table('job_vacancies')
            ->select(
                'job_vacancies.id',
                'job_vacancies.title',
                'job_vacancies.address',
                'job_vacancies.job_type',
                'job_vacancies.description',
                DB::raw(value: "DATE_FORMAT(job_vacancies.updated_at, '%d %M %Y') as updated_at"),
                'users.name as company_name',
                'companies.id as company_id'
            )
            ->join('companies', 'job_vacancies.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->where('job_vacancies.is_active', true)
            ->paginate(10);

        return view('user.jobs', compact('jobs'));
    }

    public function userViewJob(Job $job){
        $requirement = explode("\r\n", $job->requirement);
        $benefit = explode("\r\n", $job->benefit);
        // $result = DB::table('job_vacancies as jobs')
        //     ->join('companies', 'jobs.company_id', '=', 'companies.id')
        //     ->join('job_skills', 'jobs.id', '=', 'job_skills.job_id')
        //     ->join('skills','job_skills.skill_id','=','skills.id')
        //     ->join('users', 'companies.user_id', '=', 'users.id')
        //     ->select('users.name as company_name', 'jobs.title', 'jobs.address', 'jobs.updated_at', 'jobs.description', 'skills.name as skill_name')
        //     ->where('jobs.id', $job->id)
        //     ->get();

        $result = DB::table('job_vacancies as jobs')
            ->join('companies', 'jobs.company_id', '=', 'companies.id')
            ->join('job_skills', 'jobs.id', '=', 'job_skills.job_id')
            ->join('skills','job_skills.skill_id','=','skills.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->select('skills.name as skill_name')
            ->where('jobs.id', $job->id)
            ->get();

        return view('user.jobDetail', compact('job', 'requirement', 'result', 'benefit'));
    }

    public function jobByCompany(Company $company){
        $jobs = Job::where('company_id', $company->id)->where('is_active', true)->paginate(10);
        return view('user.companyJobVacancies', compact('jobs', 'company'));
    }

    public function addRequirement(Request $req){
        Job::where('id', 1)->update(['requirement' => $req->requirement, 'benefit' => $req->benefit]);
        return redirect()->route('user.job', ['job' => 1]);
    }
}
