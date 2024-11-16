<?php

use App\Http\Controllers\JobApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;

use \App\Http\Middleware\UserAuthCheck;

// Route to get the landing page
Route::view('/', 'landingPage')->middleware('guest')->name('landingPage');

// Route to get the login page
Route::view('/loginPage', 'loginPage')->middleware('guest')->name('loginPage');

// Route to get the sign up page
Route::view('/sign-up', 'signUpPage')->middleware('guest')->name('signUpPage');

// Route to get the jobs page
Route::view('/jobs', 'user.jobs')->name('jobs');

// Route to get the companies page
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');

Route::prefix("company")->group(function(){
    // Route for company sign up
    Route::get('/sign-up', [CompanyController::class, 'signUpPage'])->name('company.signUpCompany');
    Route::post('/sign-up', [CompanyController::class, 'signUp'])->name('company.submitSignUpCompany');

    // Route for company login
    Route::get('/login', [CompanyController::class, 'loginPage'])->name('company.loginCompany');
    Route::post('/login', [CompanyController::class, 'login'])->name('company.submitLoginCompany');

    // Route for company logout
    Route::post('/logout', [CompanyController::class, 'logout'])->name('company.logout');

    // Route to for company home
    Route::get('/home', [CompanyController::class, 'viewHome'])->name('company.home');

    // Route for company profile
    Route::get('/profile', [CompanyController::class, 'viewProfile'])->name('company.profile');
    Route::post('/profile', [CompanyController::class, 'updateProfile'])->name('company.updateProfile');

    // Route for list of jobs by company
    Route::get('/jobs', [JobController::class, 'getJobs'])->name('company.listJob');

    // Route for company selected job
    Route::post('/job', [JobController::class, 'createJob'])->name('company.addJob');
    Route::get('/job/{id}', [JobController::class, 'viewJob'])->name('company.job');
    Route::post('/job/{id}', [JobController::class, 'updateJob'])->name('company.updateJob');
    Route::delete('/job/{id}', [JobController::class, 'deleteJob'])->name('company.deleteJob');

    // Route for company view applicants
    Route::get('/job-applicants/{id}', [JobApplicationController::class, 'viewJobApplicants'])->name('company.jobApplicants');
    // Route::get('/applicants/{id}', [CompanyController::class, 'viewApplicants'])->name('company.applicants'); // Change status job application pending to read
});

Route::prefix("user")->group(function(){
    // Route for user sign up
    Route::get('/sign-up', action: [UserController::class, 'signUpPage'])->middleware('guest')->name('user.signUpUser');
    Route::post('/sign-up', [UserController::class, 'signUp'])->middleware('guest')->name('user.submitSignUpUser');

    // Route for user login
    Route::get('/login', [UserController::class, 'loginPage'])->name('user.loginUser');
    Route::post('/login', [UserController::class, 'login'])->name('user.submitLoginUser');

    Route::middleware('user_auth')->group(function(){
        // Route for user logout
        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

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

        // Route::get('/job/{id}', [JobController::class, 'userViewJob'])->name('user.job');
        // Route::post('/job/{id}', [UserController::class, 'applyJob'])->name('user.applyJob');

        // Route for user view applied jobs
        // Route::get('/applied-jobs', [UserController::class, 'userViewAppliedJobs'])->name('user.appliedJobs');
        // Route::delete('/applied-job/{id}', [UserController::class, 'cancelAppliedJob'])->name('user.cancelAppliedJob');

        // Route for user to be premium user
        // Route::post('/premium', [UserController::class, 'upgradeToPremium'])->name('user.upgradeToPremium');
        Route::get('/premium-history', [UserController::class, 'viewPremiumHistory'])->name('user.premiumHistory');

        // Route for user to add skill
        // Route::post('/user-skill', [UserController::class, 'addSkill'])->name('user.addSkill');
        // Route::delete('/user-skill/{id}', [UserController::class, 'deleteSkill'])->name('user.deleteSkill');
    });
});

// Route::prefix("admin")->group(function(){
//     // Route::get('/home',[AdminController::class, 'home'])->name('adminHome');

//     // Sekaligus menampilkan list user yang apply premium beserta start dan end date premium
//     // Route::get('/revenue', [AdminController::class, 'revenue'])->name('adminRevenue');

//     // Export data csv
//     // Route::get('/premium/data', [AdminController::class, 'premiumData'])->name('adminPremiumData');
// });

// Testing
// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Testing Open CV
Route::get('/testing_CV', function(){
    return view('testing_CV');
})->name('testing_CV');

Route::get('/testing_CV2/{filename}', [UserController::class, 'open_cv'])->name('getCV');
