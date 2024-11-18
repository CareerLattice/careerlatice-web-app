<?php

namespace App\Http\Controllers;

use App\Models\Applier;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class ApplierController extends Controller
{
    public function open_cv($filename){
        return response()->file(storage_path('app\\public\\user_upload\\CV\\'. $filename));
    }

    public function signUpPage(){
        return view('user.signUpUser');
    }

    public function signUp(Request $req){
        $req->validate([
            'firstname' => 'required|string',
            'lastname' => 'string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone_number' => 'string|min:8|unique:users,phone_number',
        ]);

        $fullName = $req->firstname;
        if (!empty($req->lastname)) {
            $fullName .= ' ' . $req->lastname;
        }

        $user = User::create([
            'name' => $fullName,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'phone_number' => $req->phone_number,
            'role' => 'applier',
        ]);

        $applier = Applier::create([
            'user_id' => $user->id,
            'address' => $req->address,
            'birth_date' => $req->dob,
        ]);

        dd($applier);
        session()->put('success', 'Registration successful');
        return redirect()->route('user.loginUser');
    }

    public function loginPage(){
        return view('user.loginUser');
    }
}
