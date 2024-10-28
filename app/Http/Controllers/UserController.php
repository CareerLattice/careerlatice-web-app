<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

        $user = new User([
            'name' => $fullName,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'phone_number' => $req->phone_number,
            'address' => $req->address,
            'birth_date' => $req->dob,
        ]);

        $user->save();
        return redirect()->route('user.loginUser')->with(['success' => 'Registration successful']);
    }

    public function loginPage(){
        return view('user.loginUser')->with(['success' => '']);
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

            return redirect()->route('user.home')->with('user', $user);
        }

        return redirect()->back()->withErrors(['error' => 'Invalid email or password'])->withInput();
    }

    public function logout(Request $req){
        Auth::logout();
        return redirect()->route('user.loginUser')->with(['success' => 'Logout successful']);
    }

    public function viewHome(){
        return view('user.homeUser');
    }

    public function viewProfile(){
        $user = Auth::user();
        return view('user.userProfile')->with('user', $user);
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

        $user = User::findOrFail(session('user_id'));
        $user->name = $req->name;
        $user->password = Hash::make($req->password);
        $user->phone_number = $req->phone_number;
        $user->address = $req->address;
        $user->profile_picture = $req->profile_picture;
        $user->birth_date = $req->birth_date;
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

    public function userSearchCompanies(Request $req){
        $companies = Company::where('is_active', true);
        foreach ($req->all() as $key => $value) {
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

    public function userSearchJobs(Request $req){
        $jobs = Job::where('is_active', true);
        foreach ($req->all() as $key => $value) {
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