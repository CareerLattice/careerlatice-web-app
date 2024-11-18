<?php

use App\Http\Controllers\ApplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use Illuminate\Support\Facades\Auth;
// Controller yang belum dipakai
// use App\Http\Controllers\SkillController;
// use App\Http\Controllers\UserSkillController;
// use App\Http\Controllers\AdminController;

// Route to get the landing page
Route::view('/', 'landingPage')->name('landingPage');

Route::middleware('guest')->group(function(){
    // Route to get the login page
    Route::view('/loginPage', 'loginPage')->name('loginPage');

    // Route to get the sign up page
    Route::view('/sign-up', 'signUpPage')->name('signUpPage');
});

Route::get('/job/detail', function(){
    return view('user.jobDetail');
})->name('jobDetail');

Route::get('/job/company', function(){
    return view('user.company');
})->name('jobCompany');

Route::get("/logout", function(){
        Auth::logout();
        session()->put('success', 'Logout successful');
        return redirect()->route('user.loginUser');
});

// Route to get the jobs page
Route::view('/jobs', 'user.jobs')->name('jobs');

// Route to get the companies page
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');

Route::middleware('auth')->group(function(){
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::prefix("company")->group(function(){
    Route::middleware('guest')->group(function(){
        // Route for company sign up
        Route::get('/sign-up', [CompanyController::class, 'signUpPage'])->name('company.signUpCompany');
        Route::post('/sign-up', [CompanyController::class, 'signUp'])->name('company.submitSignUpCompany');

        // Route for company login
        Route::get('/login', [CompanyController::class, 'loginPage'])->name('company.loginCompany');
    });
    Route::get('/home', [CompanyController::class, 'viewHome'])->name('company.home');

    Route::middleware('company_auth')->group(function(){
        // Route for company logout
        Route::post('/logout', [CompanyController::class, 'logout'])->name('company.logout');

        // Route to for company home

        // Route for company profile
        Route::get('/profile', [CompanyController::class, 'viewProfile'])->name('company.profile');
        Route::post('/profile', [CompanyController::class, 'updateProfile'])->name('company.updateProfile');

        // Route for list of jobs by company
        Route::get('/jobs', [JobController::class, 'getJobs'])->name('company.listJob');

        // Route for company selected job
        Route::post('/job', [JobController::class, 'createJob'])->name('company.addJob');
        Route::get('/job/{job}', [JobController::class, 'viewJob'])->name('company.job');
        Route::post('/job/{job}', [JobController::class, 'updateJob'])->name('company.updateJob');
        Route::delete('/job/{job}', [JobController::class, 'deleteJob'])->name('company.deleteJob');

        // Route for company view applicants
        Route::get('/job-applicants/{job}', [JobApplicationController::class, 'viewJobApplicants'])->name('company.jobApplicants');
        // Route::get('/applicants/{job}', [JobApplicationController::class, 'changeApplicationStatus'])->name('company.applicants'); // Jika CV dibuka Company maka change status job application pending to read
    });
});

Route::prefix("user")->group(function(){
    Route::middleware('guest')->group(function(){
        // Route for user sign up
        Route::get('/sign-up', action: [ApplierController::class, 'signUpPage'])->name('user.signUpUser');
        Route::post('/sign-up', [ApplierController::class, 'signUp'])->name('user.submitSignUpUser');

        // Route for user login
        Route::get('/login', [ApplierController::class, 'loginPage'])->name('user.loginUser');
    });

    Route::middleware('user_auth')->group(function(){
        // Route for user home
        Route::get('/home', [UserController::class, 'viewHome'])->name('user.home');

        // Route for user profile
        Route::get('/profile', [UserController::class, 'viewProfile'])->name('user.profile');
        Route::post('/profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');

        // Route for user view companies
        Route::get('/company/{company}', [CompanyController::class, 'viewCompany'])->name('user.company');
        Route::get('/search/companies', [CompanyController::class, 'searchCompany'])->name('user.searchCompany');

        // Route for user view and apply jobs
        // Route::get('/jobs', [JobController::class, index'])->name('user.jobs');
        // Route::get('/search/jobs', [JobController::class, 'searchJobs'])->name('user.jobs');

        // Route::get('/job/{job}', [JobController::class, 'userViewJob'])->name('user.job');
        // Route::post('/job/{job}', [UserController::class, 'applyJob'])->name('user.applyJob');

        // Route for user view applied jobs
        // Route::get('/applied-jobs', [UserController::class, 'userViewAppliedJobs'])->name('user.appliedJobs');
        // Route::delete('/applied-job/{job}', [UserController::class, 'cancelAppliedJob'])->name('user.cancelAppliedJob');

        // Route for user to be premium user
        // Route::post('/premium', [UserController::class, 'upgradeToPremium'])->name('user.upgradeToPremium');
        Route::get('/premium-history', [UserController::class, 'viewPremiumHistory'])->name('user.premiumHistory');

        // Route for user to add skill
        // Route::post('/user-skill', [SkillController::class, 'addSkill'])->name('user.addSkill');
        // Route::delete('/user-skill/{skill}', [SkillController::class, 'deleteSkill'])->name('user.deleteSkill');
    });
});


// Dibuat setelah user dan company selesai dibuat
// Route::prefix("admin")->group(function(){
//     // Route::get('/home',[AdminController::class, 'home'])->name('adminHome');

//     // Sekaligus menampilkan list user yang apply premium beserta start dan end date premium
//     // Route::get('/revenue', [AdminController::class, 'revenue'])->name('adminRevenue');

//     // Export data csv
//     // Route::get('/premium/data', [AdminController::class, 'premiumData'])->name('adminPremiumData');
// });

// Testing Laravel UI
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Testing Open CV
Route::get('/testing_CV', function(){
    return view('testing_CV');
})->name('testing_CV');

Route::get('/testing_CV2/{filename}', [ApplierController::class, 'open_cv'])->name('getCV');
