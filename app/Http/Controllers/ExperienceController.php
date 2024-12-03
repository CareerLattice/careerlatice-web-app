<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function create(Request $req){
        $req->validate([
            "company" => "required|string",
            "position" => "required|string",
            "job_type" => "required|string|in:Full-time,Part-time,Internship,Freelance",
            "address" => "nullable|string",
            "description" => "nullable|string",
            // "start_date"=> "nullable|date",
            // "end_date"=> "nullable|date"
        ]);

        Experience::create([
            "title" => $req->position,
            "company_name" => $req->company,
            "job_type" => $req->job_type,
            "address" => $req->address,
            "description" => $req->description,
            // "start_date" => $req->start_date,
            // "end_date" => $req->end_date,
            "applier_id" => Auth::user()->applier->id,
        ]);

        session()->flash("message", "Experience added successfully");
        return redirect()->back();
    }
}
