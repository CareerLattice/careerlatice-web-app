<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:companies',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string|max:20',
            'location' => 'string|max:255',
            'profile_picture' => 'string',
            'birth_date' => 'required|date',
            'start_date_premium' => 'date',
            'end_date_premium' => 'date',
        ]);

        $user = new User([
            'id' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'location' => $request->location,
            'profile_picture' => $request->profile_picture,
            'birth_date' => $request->birth_date,
            'start_date_premium' => $request->start_date_premium,
            'end_date_premium' => $request->phoend_date_premiumne_number,
        ]);

        $user->save();

        return response()->json($user, 201);
    }

    public function show($id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json($user);
    }

    public function userSkill($id){
        $user = User::findOrFail($id);
        $skills = $user->skills;
        return response()->json($skills);
    }

    public function userJobApplication($id){
        $user = User::findOrFail($id);
        $jobs = $user->jobApplications;
        return response()->json($jobs);
    }

    public function userEducation($id){
        $user = User::findOrFail($id);
        $educations = $user->educations;
        return response()->json($educations);
    }

    public function userHistory($id){
        $user = User::findOrFail($id);
        $histories = $user->userHistories;
        return response()->json($histories);
    }
}