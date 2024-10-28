<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;
use Illuminate\Support\Str;

class JobController extends Controller
{
    
    public function index(){
        $jobs = Job::all();
        return response()->json($jobs);
    }

    public function store(Request $request){
        $request->validate([
            'company_id' => 'required|string',
            'job_type' => 'required|in:full_time,part_time,internship',
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'skill_required' => 'required|string',
            'description' => 'required|string',
            'requirement' => 'required|string',
            'person_in_charge' => 'required|string',
            'contact_person' => 'required|string',
            'is_active' => 'required|boolean',
        ]);

        $job = new Job([
            'id' => Str::uuid(),
            'company_id' => $request->company_id,
            'job_type' => $request->job_type,
            'title' => $request->title,
            'location' => $request->location,
            'skill_required' => $request->skill_required,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'person_in_charge' => $request->person_in_charge,
            'contact_person' => $request->contact_person,
            'is_active' => $request->is_active ?? true,
        ]);

        $job->save();

        return response()->json($job, 201);
    }

    public function show($id){
        $job = Job::findOrFail($id);
        return response()->json($job);
    }

    public function update(Request $request, $id){
        $job = Job::findOrFail($id);

        $request->validate([
            'company_id' => 'required|string',
            'job_type' => 'required|in:full_time,part_time,internship',
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'skill_required' => 'required|string',
            'description' => 'required|string',
            'requirement' => 'required|string',
            'person_in_charge' => 'required|string',
            'contact_person' => 'required|string',
            'is_active' => 'required|boolean',
        ]);
        
        $job->update([
            'company_id' => $request->company_id,
            'job_type' => $request->job_type,
            'title' => $request->title,
            'location' => $request->location,
            'skill_required' => $request->skill_required,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'person_in_charge' => $request->person_in_charge,
            'contact_person' => $request->contact_person,
            'is_active' => $request->is_active ?? true,
        ]);
        return response()->json($job);
    }

    public function destroy($id){
        $job = Job::findOrFail($id);
        $job->delete();
        return response()->json($job);
    }
}
