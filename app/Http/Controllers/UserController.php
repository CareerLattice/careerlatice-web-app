<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Job;

class UserController extends Controller
{
    private $companyController;
    private $jobController;
    public function __construct(CompanyController $companyController, JobController $jobController){
        $this->companyController = $companyController;
        $this->jobController = $jobController;
    }

    public function signUpPage(){
        return view('user.signUpUser');
    }

    public function signUp(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique',
            'password' => 'required|string|min:8',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> "user",
        ]);

        $user->save();
        return redirect()->route('user.loginUser');
    }

    public function loginPage(){
        return view('user.loginUser');
    }

    public function login(Request $req){
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validatedData['email'])->first();
        
        if(!$user){
            return redirect()->back()->withErrors(['email' => 'Email unregistered'])->withInput();
        }

        if(!Hash::check($validatedData['password'], $user->password)){
            return redirect()->back()->withErrors(['password' => 'Wrong password'])->withInput();
        }
        
        $req->session()->put('user_id', $user->id);
        $req->session()->put('user_role', $user->role);
        if($user->role == 'admin'){
            return redirect()->route('admin.home');
        }

        return redirect()->route('user.home');
    }

    public function logout(Request $req){
        $req->session()->forget('user_id');
        $req->session()->forget('user_role');
        return redirect()->route('user.loginPage');
    }

    public function viewHome(){
        return view('user.homeUser');
    }

    public function viewProfile(){
        $user = User::findOrFail(session('user_id'));
        return view('user.userProfile')->with('user', $user);
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'string|min:3',
            'password' => 'string|min:8',
            'phone_number' => 'string|max:20',
            'address' => 'string|max:100',
            'profile_picture' => 'string',
            'birth_date' => 'date',
        ]);

        $user = User::findOrFail(session('user_id'));
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->profile_picture = $request->profile_picture;
        $user->birth_date = $request->birth_date;
        $user->save();
        return redirect()->route('user.profile');
    }

    public function userViewCompany($id){
        $company = $this->companyController->find($id);
        return view('user.company')->with('company', $company);
    }

    // public function userViewCompanies(){
    //     $companies = $this->companyController->index();
    //     return view('user.companies')->with('companies', $companies);
    // }

    public function userSearchCompanies(Request $request){
        $companies = Company::where('is_active', true);
        foreach ($request->all() as $key => $value) {
            if ($value !== null && $value !== '') {
                // Filter based on key dan value
                switch ($key) {
                    case 'search':
                        $companies->where('title', 'like', '%' . $value . '%');
                        break;
                    case 'field':
                        $companies->where('field', 'like', '%' . $value . '%');
                        break;
                }
            }
        }
        
        // Paginate query result
        $companies = $companies->paginate(20);
        return view('user.companies')->with('companies', $companies);
    }

    // public function userViewJobs(){
    //     $jobs = Job::where('is_active', true)->paginate(20);
    //     return view('user.jobs')->with('jobs', $jobs);
    // }

    public function userSearchJobs(Request $request){
        $jobs = Job::where('is_active', true);
        foreach ($request->all() as $key => $value) {
            if ($value !== null && $value !== '') {
                // Filter based on key dan value
                switch ($key) {
                    case 'search':
                        $jobs->where('title', 'like', '%' . $value . '%');
                        break;
                    case 'job_type':
                        $jobs->where('job_type', 'like', '%' . $value . '%');
                        break;
                }
            }
        }

        // Paginate query result
        $jobs = $jobs->paginate(20);
        return view('user.jobs')->with('jobs', $jobs);
    }

    public function show($id){
        $user = User::findOrFail($id);
        return $user;
    }

    // public function upgradeToPremium(){
    //     $user = User::findOrFail(session('user_id'));
    //     $user->role = 'premium';
    //     $user->save();
    //     return redirect()->route('user.home');
    // }

    public function viewPremiumHistory(){
        $user = User::findOrFail(session('user_id'));
        $premiumHistories = $user->userHistories;
        return view('user.premiumHistory')->with('history', $premiumHistories);
    }

    public function uploadUserCV(Request $request) {
        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);
    
        $path = $request->file('cv')->store('user_upload/CV');
        $user = User::findOrFail(session('user_id'));
        
        // Delete old CV from folder
        if (Storage::exists($user->cv)) {
            Storage::delete($user->cv);
        }

        $user->cv = $path;
        $user->save();
        return redirect()->route('user.profile');
    }
    
    public function uploadUserProfilePicture(Request $request) {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        
        $path = $request->file('profile_picture')->store('user_upload/profile_picture');
        $user = User::findOrFail(session('user_id'));
        
        // Delete old profile picture from folder
        if (Storage::exists($user->profilePicture)) {
            Storage::delete($user->profilePicture);
        }
        
        $user->profilePicture = $path;
        $user->save();
        return redirect()->route('user.profile')->with('user', $user);
    }

    // public function userSkill($id){
    //     $user = User::findOrFail($id);
    //     $skills = $user->skills;
    //     return response()->json($skills);
    // }

    // public function userJobApplication($id){
    //     $user = User::findOrFail($id);
    //     $jobs = $user->jobApplications;
    //     return response()->json($jobs);
    // }

    // public function userEducation($id){
    //     $user = User::findOrFail($id);
    //     $educations = $user->educations;
    //     return response()->json($educations);
    // }

    // public function userHistory($id){
    //     $user = User::findOrFail($id);
    //     $histories = $user->userHistories;
    //     return response()->json($histories);
    // }
}