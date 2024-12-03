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

    public function viewHome() {
        $jobApplications = DB::table('job_applications')
            ->join('job_vacancies', 'job_applications.job_id', '=', 'job_vacancies.id')
            ->join('companies', 'job_vacancies.company_id', '=', 'companies.id')
            ->join('users', 'users.id', '=', 'companies.user_id')
            ->select([
                'users.name',
                'job_vacancies.title',
                'job_applications.status',
                DB::raw("DATE_FORMAT(job_vacancies.created_at, '%d %M %Y') as created_at")
            ])
            ->where('job_applications.status', '!=', 'rejected')
            ->orderBy('job_applications.created_at', 'desc')
            ->limit(3)
            ->get();

        $applier = Applier::where('user_id', Auth::id())
            ->with('user')
            ->with('educations')
            ->with('experiences')
            ->first();
        return view('user.home', compact('jobApplications', 'applier'));
    }


    public function viewAllJobVacancies()
    {
        $userJobApplications = DB::table('job_applications')
            ->join('job_vacancies', 'job_applications.job_id', '=', 'job_vacancies.id')
            ->join('companies', 'job_vacancies.company_id', '=', 'companies.id')
            ->join('users', 'users.id', '=', 'companies.user_id')
            ->select([
                'job_vacancies.id',
                'name',
                'job_vacancies.title',
                'job_applications.status',
                DB::raw("DATE_FORMAT(job_vacancies.created_at, '%d %M %Y') as created_at")
            ])
            ->orderByRaw("
                CASE
                    WHEN job_applications.status = 'rejected' THEN 1
                    ELSE 0
                END,
                job_applications.created_at DESC
            ")
            ->paginate(6);

        return view('user.userJobVacancies', compact('userJobApplications'));
    }


    public function viewProfile(){
        $user = Auth::user();
        return view('user.userProfile', ['user' => $user]);
    }

    public function edit(){
        $applier = Applier::where('user_id', Auth::id())
            ->with('user')
            ->with('educations')
            ->with('experiences')
            ->first();

        return view('user.updateProfileUser', compact('applier'));
    }

    public function updateProfile(Request $req){
        $user = Auth::user();
        $req->validate([
            'name' => 'string|min:3',
            'headline' => 'string|max:100',
            'phone_number' => 'string|max:20|unique:users,phone_number,' . $user->id,
            'address' => 'string|max:100',
            'birth_date' => ['required', 'date', 'before_or_equal:' . Carbon::today()->toDateString()],
            'description' => 'string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($req->profile_picture){
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $req->file('profile_picture')->storeAs('user_upload/profile_picture', $user->id . '_profile_picture.' . $req->file('profile_picture')->getClientOriginalExtension(), 'public');
            $user->profile_picture = $path;
        }

        $user->update([
            'name'=> $req->name,
            'phone_number'=> $req->phone_number,
            'profile_picture'=> $user->profile_picture,
        ]);

        Applier::where('user_id', $user->id)->update([
            'headline' => $req->headline,
            'address' => $req->address,
            'birth_date' => $req->birth_date,
            'description'=> $req->description,
        ]);

        Auth::login($user);
        session()->put('message','Profile updated');
        return redirect()->back();
    }

    public function viewPremiumHistory(){
        $applier = Auth::user()->applier;
        $history = UserHistory::where('applier_id', $applier->id)->orderBy('end_date', 'desc')->paginate(10);
        return view('user.premiumHistory', compact('history'));
    }
}
