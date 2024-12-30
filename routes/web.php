<?php

use App\Http\Controllers\ApplierController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\AdminController;

// Route to get the landing page
Route::view('/', 'landingPage')->name('landingPage');

Route::middleware('guest')->group(function(){
    // Route to get the sign up page
    Route::view('/sign-up', 'signUpPage')->name('signUpPage');
});

Route::middleware('auth')->group(function(){
    // Route to get the settings page
    Route::view('/settings', 'settings')->name('settings');

    // Route to change language
    Route::get('/set-locale', function(Request $request){
        $request->validate([
            'language' => 'required|string|in:en,id',
        ]);
        $request->session()->put('locale', $request->language);
        return redirect()->back();
    })->name('setLocale');
});

// Laravel UI
// Turn off register and logout route from Laravel UI
Auth::routes(['register' => false, 'logout' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

// Route to get the jobs page
Route::get('/jobs', [JobController::class, 'index'])->name('jobs');

// Route to get the companies page
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');

// Route to get the job detail page
Route::get('/job/detail/{job}', [JobController::class, 'userViewJob'])->name('user.jobDetail');

// Route to search jobs by company
Route::get('/search/jobs/{company}', [JobController::class, 'searchJobsByCompany'])->name('user.searchJobsByCompany');

// Route for Company
Route::prefix('company')->group(function(){
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
        Route::get('/view-applicants/{applier}', [CompanyController::class, 'viewApplicants'])->name('company.viewApplicants');

        // Route for company update job application status
        Route::post('/update/application/{application}', action: [JobApplicationController::class, 'updateJobApplicationStatus'])->name('company.updateJobApplicationStatus');

        // Route to export data csv
        Route::get('/export-data/{job}', [JobApplicationController::class, 'exportCSV'])->name('company.downloadJobApplicants');
    });

    // Route to get the company detail page
    Route::get('/{company_id}', [CompanyController::class, 'viewCompany'])->name('user.company');

    // Route to get the job vacancies by company
    Route::get('/job-vacancy/{company}', [JobController::class,'jobByCompany'])->name('user.companyJobVacancies');
});

// Route for User Applier
Route::prefix('user')->group(function(){
    Route::middleware('guest')->group(function(){
        // Route for user sign up
        Route::get('/sign-up', [ApplierController::class, 'signUpPage'])->name('user.signUpUser');
        Route::post('/sign-up', [ApplierController::class, 'signUp'])->name('user.submitSignUpUser');
    });

    Route::middleware('user_auth')->group(function(){
        // Route for user home
        Route::get('/home', [ApplierController::class, 'viewHome'])->name('user.home');

        // Route for user profile
        Route::get('/update-profile', [ApplierController::class, 'edit'])->name('user.editProfile');
        Route::post('/update-profile', [ApplierController::class, 'updateProfile'])->name('user.updateProfile');
        Route::post('/edit-education/{education}', [EducationController::class, 'update'])->name('user.updateEducation');

        // Route for user view companies
        Route::get('/search/companies', [CompanyController::class, 'searchCompany'])->name('user.searchCompany');

        // Route for user view and apply jobs
        Route::get('/search/jobs', [JobController::class, 'searchJobs'])->name('user.searchJobs');
        Route::post('/apply-job/{job}', [JobApplicationController::class, 'create'])->name('user.applyJob');

        Route::get('/premium', [PremiumController::class, 'viewPremium'])->name('user.premiumUser');
        Route::get('/premium/bundle', [PremiumController::class, 'viewPremiumBundle'])->name('user.premiumBundle');

        // Route for user view applied jobs
        Route::get('/job-applications', [JobApplicationController::class, 'viewJobApplications'])->name('user.jobVacancies');

        // Route for user to be premium user
        Route::get('/premium-history', [UserController::class, 'viewPremiumHistory'])->name('user.premiumHistory');

        Route::middleware('education')->group(function(){
            Route::delete('/delete-education/{education}', [EducationController::class, 'destroy'])->name('user.deleteEducation');
        });

        Route::middleware('experience')->group(function(){
            Route::delete('/delete-experience/{experience}', [ExperienceController::class, 'destroy'])->name('user.deleteExperience');
            Route::post('/update-experience/{experience}', [ExperienceController::class, 'update'])->name('user.updateExperience');
        });

        Route::middleware('job_application')->group(function(){
            Route::delete('/delete-job-application/{job_application}', [JobApplicationController::class, 'destroy'])->name('job_application.destroy');
        });

        // User Profile
        Route::post('/add-education', [EducationController::class, 'create'])->name('user.addEducation');
        Route::post('/add-experience', [ExperienceController::class, 'create'])->name('user.addExperience');
    });
});

// Payment with MidTrans
Route::middleware('user_auth')->group(function(){
    Route::post('/premium', [PremiumController::class, 'process'])->name('user.upgradeToPremium');
    Route::get('/checkout/{transaction}', [PremiumController::class, 'checkout'])->name('user.checkout');
    Route::post('/subscription/success', [PremiumController::class, 'success'])->name('user.premiumSuccess');
});

// Route for Admin
Route::prefix('admin')->group(function(){
    // Route for admin home
    Route::get('/home',[AdminController::class, 'viewHome'])->name('admin.home');

    // Route for admin view range revenue
    Route::get('/range-revenue', [AdminController::class, 'rangeRevenue'])->name('admin.rangeRevenue');

    // Export data csv
    Route::get('/premium/data', [AdminController::class, 'exportPremiumData'])->name('adminPremiumData');
})->middleware('admin_auth');