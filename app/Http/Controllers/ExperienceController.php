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
            "start_date"=> "nullable|date",
            "end_date"=> "nullable|date"
        ]);

        Experience::create([
            "title" => $req->position,
            "company_name" => $req->company,
            "job_type" => $req->job_type,
            "address" => $req->address,
            "description" => $req->description,
            "start_date" => $req->start_date,
            "end_date" => $req->end_date,
            "applier_id" => Auth::user()->applier->id,
        ]);

        session()->flash("message", "Experience added successfully");
        return redirect()->back();
    }

    public function update(Request $request, Experience $experience){
        $request->validate([
            "companyName" => "required|string",
            "job_title" => "required|string",
            "description" => "nullable|string",
            "start_date"=> "nullable|date",
            "end_date"=> "nullable|date"
        ]);

        $experience->update([
            "title" => $request->job_title,
            "company_name" => $request->companyName,
            "description" => $request->description,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
        ]);

        session()->flash("message", "Experience updated successfully");
        return redirect()->route('user.editProfile');
    }

    public function destroy(Request $request, Experience $experience){
        $experience->delete();
        session()->flash('message', 'Success Delete Experience');
        return redirect()->route('user.editProfile');
    }
}
