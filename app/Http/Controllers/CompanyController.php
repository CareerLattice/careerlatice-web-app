<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;

class CompanyController extends Controller
{
    public function signUpPage(){
        return view('company.signUpCompany');
    }

    public function signUp(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies',
            'password' => 'required|string|min:8',
            'phone_number' => 'string|max:20',
            'description' => 'string',
            'field' => 'string|max:100',
            'address' => 'string|max:100',
            'logo' => 'string|max 255',
        ]);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'description' => $request->description,
            'field' => $request->field,
            'logo' => $request->logo,
        ]);

        return redirect()->route('company.loginPage');
    }

    public function loginPage(){
        return view('company.loginCompany');
    }

    public function login(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $company = Company::where('email', $req->email)->first();
        if(!$company){
            return redirect()->back()->withErrors(['email' => 'Email unregistered'])->withInput();
        }

        if(!Hash::check($req->input('password'), $company->password)){
            return redirect()->back()->withErrors(['password' => 'Wrong password'])->withInput();
        }

        $req->session()->put('company_id', $company->id);
        Auth::login($company);
        return redirect()->route('company.home');
    }

    public function logout(Request $request){
        $request->session()->forget('company_id');
        return redirect()->route('company.loginPage');
    }

    public function viewHome(){
        return view('company.companyHome');
    }

    public function viewProfile(){
        return view('company.companyProfile');
    }

    public function updateProfile(Request $req){
        $req->validate([
            'name' => 'string|max:255',
            'phone_number' => 'string|max:20',
            'field' => 'string|max:255',
            'address' => 'string|max:255',
            'password' => 'string|min:8',
            'description' => 'string',
            'logo' => 'string|max:255',
        ]);

        $company = Company::findOrFail(session('company_id'));

        $company->update([
            'name' => $req->name ?? $company->name,
            'email' => $req->email ?? $company->email,
            'phone_number' => $req->phone_number ?? $company->phone_number,
            'description' => $req->description ?? $company->description,
            'logo' => $req->logo ?? $company->logo,
            'field' => $req->field ?? $company->field,
            'location' => $req->location ?? $company->location,
            'password' => $req->password ? Hash::make($req->password) : $company->password,
        ]);

        return redirect()->route('company.profile');
    }

    public function index(){
        $companies = Company::paginate(20);
        return view('user.companies', ['companies' => $companies]);
    }

    public function viewCompany(Company $company){
        return view('user.company', ['company' => $company]);
    }

    public function uploadCompanyProfilePicture(Request $request) {
        // Input form with name company_profile_picture must be either jpg, png, or jpeg with maximum size of 2MB
        $request->validate([
            'company_profile_picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Save the photo to storage
        $path = $request->file('company_profile_picture')->store('company_upload/profile_picture');
        $company = Company::findOrFail(session('company_id'));

        // Delete old profile picture from folder
        if (Storage::exists($company->profilePicture)) {
            Storage::delete($company->profilePicture);
        }

        $company->profilePicture = $path;
        $company->save();
        return redirect()->route('company.profile', ['company' => $company]);
    }

    public function searchCompany(Request $req){
        $req->validate([
            'search' => 'string|nullable',
            'filter' => 'string|in:name,field',
        ],[
            'filter.in' => 'The selected filter is invalid. Please choose either ' . 'name or field'
        ]);

        $companies = Company::query();
        if($req->search != ""){
            switch ($req->filter) {
                case 'name':
                    $companies->where('name', 'like', '%' . $req->search . '%');
                    break;
                case 'field':
                    $companies->where('field', 'like', '%' . $req->search . '%');
                    break;
            }
        }

        // Paginate query result
        $companies = $companies->paginate(12)->withQueryString();
        return view('user.companies', ['companies' => $companies]);
    }
}
