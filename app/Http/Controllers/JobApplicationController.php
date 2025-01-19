<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobApplication;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobApplicationController extends Controller
{
    public function updateJobApplicationStatus(Request $req, JobApplication $application){
        $application->update([
            'status' => $req->status,
        ]);

        $status = $req->status == 'accepted' ? 'Accepted' : 'Rejected';
        return response()->json(['status'=> $status]);
    }

    // User can view job application
    public function viewJobApplications(){
        $userJobApplications = DB::table('job_applications')
            ->join('job_vacancies', 'job_applications.job_id', '=', 'job_vacancies.id')
            ->join('companies', 'job_vacancies.company_id', '=', 'companies.id')
            ->join('users', 'users.id', '=', 'companies.user_id')
            ->select([
                'job_vacancies.id',
                'name',
                'job_vacancies.title',
                'job_applications.id as application_id',
                'job_applications.status',
                DB::raw("DATE_FORMAT(job_vacancies.created_at, '%d %M %Y') as created_at")
            ])
            ->where("job_applications.applier_id", '=', Auth::user()->applier->id)
            ->orderByRaw("
                CASE
                    WHEN job_applications.status = 'rejected' THEN 1
                    ELSE 0
                END,
                job_applications.created_at DESC
            ")
            ->paginate(6)
            ->withQueryString();

        return view('user.userJobVacancies', compact('userJobApplications'));
    }

    public function create(Job $job){
        $applier = Auth::user()->applier;

        $jobApplication = JobApplication::where('job_id', $job->id)
            ->where('applier_id', $applier->id)
            ->first();

        if($jobApplication){
            session()->flash('error', 'You already applied for this job');
            return redirect()->back();
        }

        if(Auth::user()->phone_number == null){
            session()->flash('error', 'Please fill your phone number before applying for a job');
            return redirect()->route('user.jobVacancies');
        }

        if($applier->cv_url == null){
            session()->flash('error', 'Please upload your CV before applying for a job');
            return redirect()->route('user.jobVacancies');
        }

        JobApplication::create([
            'job_id' => $job->id,
            'applier_id' => $applier->id,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Job application submitted successfully');
        return redirect()->route('user.jobVacancies');
    }

    public function destroy(JobApplication $jobApplication){
        $jobApplication->update([
            'status'=> 'cancelled',
        ]);

        $jobApplication->delete();

        session()->flash('message', 'Job Application has been unapplied');
        return redirect()->route('user.jobVacancies');
    }
}
