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
        ]);

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.home');
            } else if($user->role == 'company'){
                return redirect()->route('company.home');
            }

            return redirect()->route('user.home');
        }

        return redirect()->back()->withErrors(['error' => 'Invalid email or password'])->withInput();
    }

    public function logout(){
        Auth::logout();
        session()->put('success', 'Logout successful');
        return redirect()->route('loginPage');
    }
}
