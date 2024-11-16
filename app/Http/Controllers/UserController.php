<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\UserHistory;

class UserController extends Controller
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

        User::create([
            'name' => $fullName,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'phone_number' => $req->phone_number,
            'address' => $req->address,
            'birth_date' => $req->dob,
        ]);

        session()->put('success', 'Registration successful');
        return redirect()->route('user.loginUser');
    }

    public function loginPage(){
        return view('user.loginUser');
    }

    public function login(Request $req){
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.home');
            }

            return redirect()->route('user.home');
        }

        return redirect()->back()->withErrors(['error' => 'Invalid email or password'])->withInput();
    }

    public function logout(){
        Auth::logout();
        session()->put('success', 'Logout successful');
        return redirect()->route('user.loginUser');
    }

    public function viewHome(){
        return view('user.homeUser');
    }

    public function viewProfile(){
        $user = Auth::user();
        return view('user.userProfile', ['user' => $user]);
    }

    public function updateProfile(Request $req){
        $req->validate([
            'name' => 'string|min:3',
            'password' => 'string|min:8',
            'phone_number' => 'string|max:20',
            'address' => 'string|max:100',
            'profile_picture' => 'string',
            'birth_date' => 'date',
        ]);

        $user = Auth::user();
        $user->name = $req->name;
        $user->password = Hash::make($req->password);
        $user->phone_number = $req->phone_number;
        $user->address = $req->address;
        $user->profile_picture = $req->profile_picture;
        $user->birth_date = $req->birth_date;
        $user->save();

        Auth::login($user);
        session()->put('success','Profile updated');
        return redirect()->route('user.profile');
    }

    // User can upload CV
    public function uploadUserCV(Request $req) {
        $req->validate([
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path = $req->file('cv')->store('user_upload/CV');
        $user = Auth::user();

        // Delete old CV from folder
        if (Storage::exists($user->cv)) {
            Storage::delete($user->cv);
        }

        $user->cv = $path;
        $user->save();
        return redirect()->route('user.profile');
    }

    // User can upload profile picture
    public function uploadUserProfilePicture(Request $req) {
        $req->validate([
            'profile_picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $req->file('profile_picture')->store('user_upload/profile_picture');
        $user = Auth::user();

        // Delete old profile picture from folder
        if (Storage::exists($user->profilePicture)) {
            Storage::delete($user->profilePicture);
        }

        $user->profilePicture = $path;
        $user->save();
        return redirect()->route('user.profile', ['user' => $user]);
    }

    // public function userEducation($id){
    //     $user = User::findOrFail($id);
    //     $educations = $user->educations;
    //     return $educations;
    // }

    // public function userHistory($id){
    //     $user = User::findOrFail($id);
    //     $histories = $user->userHistories;
    //     return $histories;
    // }

    // public function viewApplicant(User $user){
    //     return view('company.applicant', ['applicant' => $user]);
    // }

    // public function upgradeToPremium(){
    //     $user = User::findOrFail(session('user_id'));
    //     $user->role = 'premium';
    //     $user->save();
    //     return redirect()->route('user.home');
    // }

    public function viewPremiumHistory(){
        $premiumHistories = UserHistory::where('user_id', session('user_id'))->orderBy('end_date', 'desc')->get();
        return view('user.premiumHistory', ['history' => $premiumHistories]);
    }
}
