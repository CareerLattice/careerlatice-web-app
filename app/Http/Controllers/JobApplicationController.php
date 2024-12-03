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
    // Company can view job applicants
    // public function viewJobApplicants(Job $job){
    //     $applicants = $job->applicants->paginate(25)->withQueryString();
    //     return view('company.jobApplicants', ['applicants' => $applicants]);
    // }

    public function exportCSV(Job $job){
        // $data = JobApplication::with('applier.user')->where('job_id', $job->id)->get();
        $result = DB::table('job_applications')
            ->join('appliers', 'job_applications.applier_id', '=', 'appliers.id')
            ->join('users', 'appliers.user_id', '=', 'users.id')
            ->select('users.name', 'users.email', 'users.phone_number', 'appliers.address', 'appliers.birth_date', 'job_applications.created_at')
            ->where('job_applications.job_id', $job->id)
            ->get();

        $fileName = 'jobApplications.csv';
        $filePath = public_path($fileName);

        $fp = fopen($fileName,'w+');
        fputcsv($fp, fields: array('Name', 'Email', 'Phone Number', 'Address', 'Birth Date', 'Applied at'));
        foreach($result as $row){
            fputcsv($fp, array(
                $row->name,
                $row->email,
                $row->phone_number,
                $row->address,
                $row->birth_date,
                $row->applied_at
            ));
        }
        fclose($fp);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function updateJobApplicationStatus(Request $req, JobApplication $application){
        $application->update([
            'status' => $req->status,
        ]);

        $status = $req->status == 'accepted' ? 'Accepted' : 'Rejected';
        return response()->json(['status'=> $status]);

        // Reload page
        // return redirect()->back();
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
                'job_applications.status',
                DB::raw("DATE_FORMAT(job_vacancies.created_at, '%d %M %Y') as created_at")
            ])
            ->where("job_applications.applier_id", Auth::user()->applier->id)
            ->orderByRaw("
                CASE
                    WHEN job_applications.status = 'rejected' THEN 1
                    ELSE 0
                END,
                job_applications.created_at DESC
            ")
            ->paginate(6);

        return view('user.userJobVacancies', compact('userJobApplications'));
    }

    public function create(Job $job){
        $jobApplication = JobApplication::where('job_id', $job->id)
            ->where('applier_id', Auth::user()->applier->id)
            ->first();

        if($jobApplication){
            session()->put('error', 'You already applied for this job');
            return redirect()->back();
        }

        JobApplication::create([
            'job_id' => $job->id,
            'applier_id' => Auth::user()->applier->id,
            'status' => 'pending',
        ]);

        session()->put('message', 'Job application submitted successfully');
        return redirect()->route('user.jobVacancies');
    }
}
