<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function login(Request $req){
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role'  => 'required',
        ]);

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $user = Auth::user();

            if($req->role == 'company' && $user->role == 'company')
                return redirect()->route('company.home');
            else if($req->role != 'company' && $user->role != 'company'){
                if ($user->role === 'admin') {
                    return redirect()->route('admin.home');
                }

                return redirect()->route('user.home');
            }
        }
        Auth::logout();
        return redirect()->back()->withErrors(['error' => 'Invalid email or password'])->withInput();
    }

    public function logout(){
        $role = Auth::user()->role;
        Auth::logout();
        session()->put('message', 'Logout successful');

        if($role ==  'company'){
            return redirect()->route('company.loginCompany');
        }

        return redirect()->route('user.loginUser');
    }
}
