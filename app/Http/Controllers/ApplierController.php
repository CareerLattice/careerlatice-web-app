<?php

namespace App\Http\Controllers;

use App\Models\Applier;
use App\Models\User;
use App\Models\UserHistory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ApplierController extends Controller
{
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
                'profile_picture' => 'default_profile_picture.jpg',
            ]);

            Applier::create([
                'user_id'=> $user->id,
                'address'=> $req->address,
                'birth_date'=> $req->birth_date,
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
            ->where('applier_id', Auth::user()->applier->id)
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

    public function updateProfile(Request $request){
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|min:3',
            'headline' => 'nullable|string|max:100',
            'phone_number' => 'string|max:20|unique:users,phone_number,' . $user->id,
            'address' => 'string|max:100',
            'birth_date' => ['required', 'date', 'before_or_equal:' . Carbon::today()->toDateString()],
            'description' => 'string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
            'cv' => 'nullable|mimes:pdf|max:2048',
        ], [
            'name.min' => 'The name must be at least 3 characters.',
            'name.string' => 'The name must be a valid string.',
            'headline.max' => 'The headline cannot be longer than 100 characters.',
            'phone_number.max' => 'The phone number cannot be longer than 20 characters.',
            'phone_number.unique' => 'This phone number has already been taken.',
            'address.max' => 'The address cannot be longer than 100 characters.',
            'birth_date.required' => 'The birth date is required.',
            'birth_date.date' => 'The birth date must be a valid date.',
            'birth_date.before_or_equal' => 'The birth date cannot be in the future.',
            'description.max' => 'The description cannot be longer than 255 characters.',
            'profile_picture.image' => 'The profile picture must be an image.',
            'profile_picture.mimes' => 'The profile picture must be a file of type: jpg, jpeg, png.',
            'profile_picture.max' => 'The profile picture cannot be larger than 1MB.',
            'cv.mimes' => 'The CV must be a PDF file.',
            'cv.max' => 'The CV cannot be larger than 2MB.',
        ]);

        if($request->hasFile('profile_picture')){
            $file = $request->file('profile_picture');
            $fileName = 'profile_picture/' . $user->id . '_profile_picture.' . $request->file('profile_picture')->getClientOriginalExtension();

            if ($user->profile_picture && $user->profile_picture != 'default_profile_picture.jpg' && Storage::disk('google')->exists($user->profile_picture)) {
                Storage::disk('google')->delete($user->profile_picture);
            }

            Storage::disk('google')->put($fileName, File::get($file), "public");
            $user->profile_picture = $fileName;
        }

        $applier = $user->applier;
        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $fileName = 'CV/' . $user->id . '_cv.' . $request->file('cv')->getClientOriginalExtension();

            if ($applier->cv_url && $applier->cv_url != 'default_cv.pdf' && Storage::disk('google')->exists($applier->cv_url)) {
                Storage::disk('google')->delete($applier->cv_url);
            }

            Storage::disk('google')->put($fileName, File::get($file), "public");
            $applier->cv_url = $fileName;
        }

        $user->update([
            'name'=> $request->name,
            'phone_number'=> $request->phone_number,
            'profile_picture'=> $user->profile_picture,
        ]);

        Applier::where('user_id', $user->id)->update([
            'headline' => $request->headline,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'description'=> $request->description,
            'cv_url' => $applier->cv_url,
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
