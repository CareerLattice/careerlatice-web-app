<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobApplication;
use App\Models\Job;
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
            ->select('users.name', 'users.email', 'users.phone_number', 'appliers.address', 'appliers.birth_date', 'job_applications.applied_at')
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

    // User can view job application
    // public function userJobApplication(){

    //     $id = session('user_id');
    //     $jobs = JobApplication::where('user_id', $id)->get();

    //     Or

    //     $user = User::findOrFail($id);
    //     $jobs = $user->jobApplications;

    //     return view('user.homeUser', ['jobs' => $jobs]);
    // }
}
