<?php

use App\Http\Controllers\ApplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobApplicationController;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

/* Controller yang belum dipakai */
// use App\Http\Controllers\SkillController;
// use App\Http\Controllers\UserSkillController;
// use App\Http\Controllers\AdminController;

/* View yang tidak akan dipakai */
// LoginPage
// testing_CV
// home
// user.loginUser

// Route to get the landing page
Route::view('/', 'landingPage')->name('landingPage');

Route::middleware('guest')->group(function(){
    // Route to get the sign up page
    Route::view('/sign-up', 'signUpPage')->name('signUpPage');
});

// Laravel UI
// Turn off register and logout route from Laravel UI
Auth::routes(['register' => false, 'logout' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Route to get the jobs page
Route::get('/jobs', [JobController::class, 'index'])->name('jobs');

// Route to get the companies page
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');

Route::prefix("company")->group(function(){
    Route::middleware('guest')->group(function(){
        // Route for company sign up
        Route::get('/sign-up', [CompanyController::class, 'signUpPage'])->name('company.signUpCompany');
        Route::post('/sign-up', [CompanyController::class, 'signUp'])->name('company.submitSignUpCompany');
    });

    Route::middleware('company_auth')->group(function(){
        Route::get('/home', [CompanyController::class, 'viewHome'])->name('company.home');

        // Route for company profile
        Route::get('/profile', [CompanyController::class, 'viewProfile'])->name('company.profile');
        Route::post('/profile', [CompanyController::class, 'updateProfile'])->name('company.updateProfile');

        // Route for list of jobs by company
        Route::get('/jobs', [JobController::class, 'getJobs'])->name('company.listJob');

        // Route for company selected job
        Route::get('/job/{job}', [JobController::class, 'viewJob'])->name('company.job');
        Route::post('/job/{job}', [JobController::class, 'updateJob'])->name('company.updateJob');
        Route::delete('/job/{job}', [JobController::class, 'deleteJob'])->name('company.deleteJob');

        // Route for company create job
        Route::get('/create-job', [JobController::class, 'createJob'])->name('company.createJobPage');
        Route::post('/create-job', [JobController::class, 'create'])->name('company.createJob');

        // Route for company edit job
        Route::get('/editjob', function () {
            return view('company.editJob');
        })->name('editJob');
        // Route::post('/editjob', [JobController::class, 'update'])->name('company.updateJob');

        // Route for company view applicants
        Route::get('/job-applicants/{id}', [CompanyController::class, 'viewJobApplicants'])->name('company.jobApplicants');
        // Route::get('/applicants/{id}', [CompanyController::class, 'viewApplicants'])->name('company.applicants'); // Change status job application pending to read
    });

    Route::get('/edit-profile', function(){
        return view('company.companyProfile');
    })->name('updateCompany');
});

Route::prefix("user")->group(function(){
    Route::middleware('guest')->group(function(){
        // Route for user sign up
        Route::get('/sign-up', action: [ApplierController::class, 'signUpPage'])->name('user.signUpUser');
        Route::post('/sign-up', [ApplierController::class, 'signUp'])->name('user.submitSignUpUser');

    });

    Route::middleware('user_auth')->group(function(){
        // Route for user home
        Route::get('/home', [ApplierController::class, 'viewHome'])->name('user.home');

        // Route for user profile
        Route::get('/profile', [UserController::class, 'viewProfile'])->name('user.profile');
        Route::post('/profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');

        // Route for user view companies
        Route::get('/search/companies', [CompanyController::class, 'searchCompany'])->name('user.searchCompany');

        // Route for user view and apply jobs
        // Route::get('/jobs', [JobController::class, index'])->name('user.jobs');
        Route::get('/search/jobs', [JobController::class, 'searchJobs'])->name('user.searchJobs');

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

// Testing Open CV
Route::get('/testing_CV', function(){
    return view('testing_CV');
})->name('testing_CV');

Route::get('/testing_CV2/{filename}', [ApplierController::class, 'open_cv'])->name('getCV');

// Testing Export CSV
Route::get('/testing_export/{job}', [JobApplicationController::class, 'exportCSV'])->name('downloadJobApplicants');

// Testing Add Requirement
Route::post('/requirement', [JobController::class, 'addRequirement'])->name('addRequirement');

// For User
// Done and Tested
Route::get('/job/detail/{job}', [JobController::class, 'userViewJob'])->name('user.jobDetail');

// Done and Have not been tested
Route::get('/user/company/{company_id}', [CompanyController::class, 'viewCompany'])->name('user.company');
Route::get('/user/company/job-vacancy/{company}', [JobController::class,'jobByCompany'])->name('user.companyJobVacancies');
Route::get('/search/jobs/{company}', [JobController::class, 'searchJobsByCompany'])->name('user.searchJobsByCompany');


// Not Done
Route::get('/user/edit-profile', function(){
    return view('user.updateProfileUser');
})->name('updateUser');
