<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
            'job_type' => 'required|in:Full-time,Part-time,Internship,Freelance',
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
            'job_type' => 'required|in:Full-time,Part-time,Internship,Freelance',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'requirement' => 'required|string',
            'benefit' => 'required|string',
            'person_in_charge' => 'required|string',
            'contact_person' => 'required|string',
            'is_active' => 'required|boolean',
            'job_image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Update status job application to rejected
        if($req->is_active == 0 && $job->is_active == 1){
            JobApplication::where('job_id', $job->id)->update(['status' => 'rejected']);
        }

        if($req->hasFile('job_image')){
            $file = $req->file('profile_picture');
            $destinationPath = public_path('upload/company/job_picture');
            $fileName = $job->id . '_profile_picture.' . $req->file('job_image')->getClientOriginalExtension();

            if ($job->job_picture && $job->job_picture != 'default_job_picture.jpg' && File::exists(public_path('upload/company/job_picture/' . $job->job_picture))) {
                File::delete(public_path('upload/company/job_picture/' . $job->job_picture));
            }

            $file->move($destinationPath, $fileName);

            $job->job_picture = $fileName;
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
            'job_picture' => $job->job_picture,
        ]);

        return redirect()->route('company.job', compact('job'));
    }

    // Company can view the job vacancies they create
    public function viewJob(Job $job, Request $request){
        $sort = $request->get('sort');
        $order = $request->get('order');

        $applicants = DB::table('users')
            ->join('appliers', 'users.id', '=', 'appliers.user_id')
            ->join('job_applications', 'appliers.id', '=', 'job_applications.applier_id')
            ->where('job_applications.job_id', $job->id)
            ->select('users.name', 'appliers.cv_url as cv', 'job_applications.status', 'job_applications.id as job_application_id', 'appliers.id as applier_id',
            DB::raw('DATE_FORMAT(job_applications.created_at, "%d %M %Y") as applied_at'));

        if($sort != null){
            $applicants = $applicants->orderBy($sort, $order);
        }

        $applicants = $applicants->orderBy('appliers.end_date_premium','desc')
        ->paginate(10);

        return view('company.job', compact('job', 'applicants', 'sort', 'order'));
    }

    public function filterJobs(Request $req, Job $job){
        $req->validate([
            'filter' => 'string|nullable',
            'sort' => 'string|nullable',
            'order'=> 'string|nullable|in:desc,asc',
        ]);

        $applicants = DB::table('users')
            ->join('appliers', 'users.id', '=', 'appliers.user_id')
            ->join('job_applications', 'appliers.id', '=', 'job_applications.applier_id')
            ->select('users.name', 'appliers.cv_url as cv', 'job_applications.status', 'job_applications.id as job_application_id', 'appliers.id as applier_id',
            DB::raw('DATE_FORMAT(job_applications.created_at, "%d %M %Y") as applied_at')   )
            ->where('job_applications.job_id', $job->id)
            ->orderBy('appliers.end_date_premium','desc');

        if($req->filter){
            $applicants = $applicants->where('status', 'LIKE',$req->filter);
        }

        $sort = $req->get('sort');
        $order = $req->get('order');
        if($sort){
            $applicants = $applicants->orderBy($sort, $order);
        }

        $applicants = $applicants->paginate(10);

        return view('company.job', compact('job', 'applicants', 'sort','order'));
    }

    // Company can view all job vacancies they create
    public function getJobs(){
        $company = Auth::user()->company;
        $jobs = $company->jobs()->paginate(20)->withQueryString();
        return view('company.listJob', compact('jobs'));
    }


    // Company can search specific job they create
    public function CompanySearchJobs(Request $req){
        $req->validate([
            'search' => 'string|nullable',
            'job_type' => 'array|nullable',
            'is_active' => 'array|nullable'
        ]);

        $company = Auth::user()->company;
        $query = $company->jobs();

        if ($req->has('search') && !empty($req->search)) {
            $query = $query->where('title', 'like', '%'.$req->search.'%');
        }

        if ($req->filled('job_type')) {
            $query = $query->whereIn('job_type', $req->job_type);
        }

        if ($req->filled('is_active')) {
            $query = $query->whereIn('is_active', $req->is_active);
        }

        $jobs = $query->paginate(20)->withQueryString();

        return view('company.listJob', compact('jobs'));
    }


    // Company can delete job vacancies they create
    public function deleteJob(Job $job){
        // Update status job application to rejected
        JobApplication::where('job_id', $job->id)->update(['status' => 'rejected']);

        // Soft Delete the Job
        $job->delete();
        session()->flash('message', 'Job has been deleted');
        return redirect()->route('company.listJob');
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
            ->where('company_id', $company->user->id)
            ->select(
                'job_vacancies.id',
                'job_vacancies.title',
                'job_vacancies.address',
                'job_vacancies.job_type',
                'job_vacancies.description',
                'job_vacancies.is_active',
                'job_vacancies.job_picture',
                DB::raw(value: "DATE_FORMAT(job_vacancies.updated_at, '%d %M %Y') as updated_at"),
                'users.name as company_name');

        if ($req->filled('search')) {
            $jobs->where($req->filter, 'like', '%' . $req->search . '%');
        }

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
                'job_vacancies.person_in_charge',
                'job_vacancies.job_picture',
                DB::raw("DATE_FORMAT(job_vacancies.updated_at, '%d %M %Y') as updated_at"),
                'users.name as company_name',
                'companies.id as company_id',
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
        return view('user.jobDetail', compact('job', 'requirement', 'benefit'));
    }

    public function jobByCompany(Company $company, Request $req){
        $req->validate([
            'search'=> 'string|nullable',
            'filter' => 'string|in:title,job_type',
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
                'job_vacancies.job_picture',
                DB::raw(value: "DATE_FORMAT(job_vacancies.updated_at, '%d %M %Y') as updated_at"),
                'users.name as company_name');

        if ($req->filled('search')) {
            $jobs->where($req->filter, 'like', '%' . $req->search . '%');
        }

        $jobs = $jobs->paginate(5)->withQueryString();
        return view('user.companyJobVacancies', compact('jobs', 'company'));
    }
}
