<?php

use App\Http\Controllers\ApplierController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\AdminController;

/* Controller yang belum dipakai */
// use App\Http\Controllers\SkillController;
// use App\Http\Controllers\UserSkillController;

/* View yang tidak akan dipakai */
// testing_CV
// home

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

        // Route for company search job
        Route::get('/jobs/search', [JobController::class, 'companySearchJobs'])->name('company.searchJobs');

        // Route for company selected job
        Route::middleware('job_auth')->group(function(){
            Route::get('/job/{job}', [JobController::class, 'viewJob'])->name('company.job');
            Route::delete('/job/{job}', [JobController::class, 'deleteJob'])->name('company.deleteJob');
        });
        // Route for company filter job
        Route::get('/job/{job}/filter',[JobController::class, 'filterJobs'])->name('company.filter');

        // Route for company create job
        Route::get('/create-job', [JobController::class, 'createJob'])->name('company.createJobPage');
        Route::post('/create-job', [JobController::class, 'create'])->name('company.createJob');

        // Route for company edit job
        Route::get('/edit-job/{job}', [JobController::class, 'editJob'])->name('company.editJob');
        Route::post('/edit-job/{job}', [JobController::class, 'update'])->name('company.updateJob');

        // Route for company view applicants
        // Route::get('/job-applicants/{id}', action: [CompanyController::class, 'viewJobApplicants'])->name('company.jobApplicants');
        // Route::get('/applicants/{id}', [CompanyController::class, 'viewApplicants'])->name('company.applicants'); // Change status job application pending to read
    });

    Route::get('/edit-profile', [CompanyController::class, 'viewProfile'])->name('updateCompany');
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

        Route::get('/job-vacancies', [JobApplicationController::class, 'viewJobApplications'])->name('user.jobVacancies');

        // Route for user profile
        Route::get('/update-profile', [ApplierController::class, 'edit'])->name('user.editProfile');
        Route::post('/update-profile', [ApplierController::class, 'updateProfile'])->name('user.updateProfile');

        // Route for user view companies
        Route::get('/search/companies', [CompanyController::class, 'searchCompany'])->name('user.searchCompany');

        // Route for user view and apply jobs
        // Route::get('/jobs', [JobController::class, index'])->name('user.jobs');
        Route::get('/search/jobs', [JobController::class, 'searchJobs'])->name('user.searchJobs');

        Route::post('/apply-job/{job}', [JobApplicationController::class, 'create'])->name('user.applyJob');

        // Route for user view applied jobs
        // Route::get('/applied-jobs', [UserController::class, 'userViewAppliedJobs'])->name('user.appliedJobs');
        // Route::delete('/applied-job/{job}', [UserController::class, 'cancelAppliedJob'])->name('user.cancelAppliedJob');

        // Route for user to be premium user
        Route::get('/premium-history', [UserController::class, 'viewPremiumHistory'])->name('user.premiumHistory');

        // Route for user to add skill
        // Route::post('/user-skill', [SkillController::class, 'addSkill'])->name('user.addSkill');
        // Route::delete('/user-skill/{skill}', [SkillController::class, 'deleteSkill'])->name('user.deleteSkill');

    });
});

route::get('/user/editEducation', function(){
    return view('user.editEducation');
})->name ('editEducation');

route::get('/user/editExperience', function(){
    return view('user.editExperience');
})->name ('editExperience');

// Dibuat setelah user dan company selesai dibuat
Route::prefix("admin")->group(function(){
    Route::get('/home',[AdminController::class, 'viewHome'])->name('admin.home');

    // Sekaligus menampilkan list user yang apply premium beserta start dan end date premium
    // Route::get('/revenue', [AdminController::class, 'revenue'])->name('adminRevenue');

    // Export data csv
    // Route::get('/premium/data', [AdminController::class, 'premiumData'])->name('adminPremiumData');
});

// Testing Open CV
Route::get('/testing_CV', function(){
    return view('testing_CV');
})->name('testing_CV');

Route::get('/testing_CV2/{filename}', [ApplierController::class, 'open_cv'])->name('getCV');

// Testing Export CSV
Route::get('/testing_export/{job}', [JobApplicationController::class, 'exportCSV'])->name('company.downloadJobApplicants');

// Testing Add Requirement
Route::post('/requirement', [JobController::class, 'addRequirement'])->name('addRequirement');

// For User
Route::get('/user/premium', function(){
    return view('user.premiumUser');
})->name('user.premiumUser');

// Done and Tested
Route::get('/job/detail/{job}', [JobController::class, 'userViewJob'])->name('user.jobDetail');

// Done and Have not been tested
Route::get('/user/company/{company_id}', [CompanyController::class, 'viewCompany'])->name('user.company');
Route::get('/user/company/job-vacancy/{company}', [JobController::class,'jobByCompany'])->name('user.companyJobVacancies');
Route::get('/search/jobs/{company}', [JobController::class, 'searchJobsByCompany'])->name('user.searchJobsByCompany');

Route::post('/company/update/application/{application}', [JobApplicationController::class, 'updateJobApplicationStatus'])->name('company.updateJobApplicationStatus');

// Not Done
Route::get('/settings',function(){
    return view('settings');
})->name('settings');

Route::post('/add-education', [EducationController::class, 'create'])->name('user.addEducation');
Route::post('/add-experience', [ExperienceController::class, 'create'])->name('user.addExperience');
Route::get('/company/view-applicants/{applier}', [CompanyController::class, 'viewApplicants'])->name('company.viewApplicants');

// Testing Membuat Data untuk Client Side Rendering
use App\Models\Company;
Route::get('/test/data', function(){
    $data = Company::orderBy('id')->take(10)->get();
    return response()->json([
        'status' => '200',
        'message' => 'Success',
        'data' => $data,
    ]);
});

// Testing untuk MidTrans
Route::post('/premium', [PremiumController::class, 'process'])->name('user.upgradeToPremium');
Route::get('/checkout/{transaction}', [PremiumController::class, 'checkout'])->name('user.checkout');
Route::post('/subscription/success', [PremiumController::class, 'success'])->name('user.premiumSuccess');
