<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

use App\Models\Job;
use Illuminate\Support\Str;

class JobController extends Controller
{
    // Company Section for Job
    // Company can create Job
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

        Job::create([
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

    // Company can update Job
    public function updateJob(Request $req, Job $job){
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

    // Company can view the job vacancies they create
    public function viewJob(Job $job){
        return view('company.job', ['job' => $job]);
    }

    // Company can view all job vacancies they create
    public function getJobs(){
        $id = session('company_id');
        $company = Company::findOrFail($id);
        $jobs = $company->jobs()->paginate(20)->withQueryString();
        return view('company.companyJobs', ['jobs' => $jobs]);
    }

    // Company can delete job vacancies they create
    public function deleteJob(Job $job){
        // Soft Delete
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
        $jobs = Job::where('is_active', true);
        foreach ($req->all() as $key => $value) {
            if ($value !== null && $value !== '') {
                // Filter based on key dan value
                switch ($key) {
                    case 'search':
                        $jobs->where('title', 'like', '%' . $value . '%');
                        break;
                    case 'job_type':
                        $jobs->where('job_type', 'like', '%' . $value . '%');
                        break;
                }
            }
        }

        // Paginate query result
        $jobs = $jobs->paginate(20)->withQueryString();
        return view('user.jobs', ['jobs' => $jobs]);
    }

    // Return all job vacancies with pagination 20 per page
    public function index(){
        $jobs = Job::where('is_active', true)->paginate(20);
        return view('user.jobs', ['jobs' => $jobs]);
    }
}
