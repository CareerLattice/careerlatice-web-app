<?php

namespace App\Http\Controllers;

use App\Models\Applier;
use App\Models\User;
use App\Models\UserHistory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone_number' => 'string|min:8|unique:users,phone_number',
            'address' => 'required|string|max:100',
            'birth_date' => ['required', 'date', 'before_or_equal:' . Carbon::today()->toDateString()],
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'phone_number' => $req->phone_number,
                'role' => 'applier',
            ]);

            Applier::create([
                'user_id' => $user->id,
                'address' => $req->address,
                'birth_date' => $req->dob,
            ]);

            DB::commit();
            $req->session()->put('message','Successfully registered');
            return redirect()->route('login');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Please try again later.']);
        }
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
            'phone_number' => 'string|max:20',
            'address' => 'string|max:100',
            'profile_picture' => 'string',
            'birth_date' => 'before:today',
        ]);

        $user = Auth::user();
        $user->update([
            'name'=> $req->name,
            'phone_number'=> $req->phone_number,
            'profile_picture' => $req->profile_picture,
        ]);

        Applier::where('user_id', $user->id)->update([
            'address' => $req->address,
            'birth_date' => $req->birth_date,
        ]);

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
        if (Storage::exists($user->applier->cv)) {
            Storage::delete($user->applier->cv);
        }

        Applier::where('user_id', $user->id)->update(['cv_url' => $path]);
        Auth::login($user);
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
        if (Storage::exists($user->profile_picture)) {
            Storage::delete($user->profile_picture);
        }

        $user->profilePicture = $path;
        User::where('id', $user->id)->update(['profile_picture' => $path]);

        $updatedUser = User::find($user->id);
        Auth::login($updatedUser);
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

    // public function upgradeToPremium(Request $req){
    //     $req->validate([
    //         'duration' => 'required|numeric',
    //     ]);

    //     $applier = Applier::where('user_id', Auth::user()->id)->first();
    //     if($applier->end_date_premium > now()){
    //         return redirect()->back();
    //     }

    //     DB::beginTransaction();
    //     try {
    //         $applier->update([
    //             'start_date_premium' => now(),
    //             'end_date_premium' => now()->addMonths($req->duration),
    //         ]);

    //         UserHistory::create([
    //             'applier_id'=> $applier->id,
    //             'start_date' => $applier->start_date_premium,
    //             'end_date' => $applier->end_date_premium,
    //         ]);

    //         DB::commit();
    //         return redirect()->route('user.home');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return back()->withErrors(['error' => 'Please try again later.']);
    //     }
    // }

    public function viewPremiumHistory(){
        $applier = Auth::user()->applier;
        $history = UserHistory::where('applier_id', $applier->id)->orderBy('end_date', 'desc')->paginate(10);
        return view('user.premiumHistory', compact('history'));
    }
}
