<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function create(Request $req){
        $req->validate([
            "institution" => "required|string",
            "degree" => "nullable|string",
            "field" => "nullable|string",
            "grade" => "nullable|numeric",
            "max_grade" => "nullable|numeric",
            "start_date" => "nullable|date",
            "end_date" => "nullable|date",
            "description" => "nullable|string",
        ]);

        Education::create([
            "institution_name" => $req->institution,
            "grade" => $req->grade,
            "max_grade" => $req->max_grade,
            "degree" => $req->degree,
            "start_date" => $req->start_date,
            "end_date"=> $req->end_date,
            "description" => $req->description,
            "applier_id" => Auth::user()->applier->id,
        ]);

        session()->put("message", "Education added successfully");
        return redirect()->back();
    }
}