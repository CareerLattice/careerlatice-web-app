<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobApplication;
use App\Models\Job;

class JobApplicationController extends Controller
{
    // Company can view job applicants
    // public function viewJobApplicants(Job $job){
    //     $applicants = $job->applicants->paginate(25)->withQueryString();
    //     return view('company.jobApplicants', ['applicants' => $applicants]);
    // }

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
