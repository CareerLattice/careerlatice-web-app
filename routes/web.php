<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/signUpDev', function () {
    return view('signUpDevPage');
});

Route::get('/HomePage', function () {
    return view('homePage');
});

Route::get('/signUpCompany', function(){
    return view('signUpCompanyPage');
});
Route::get('/home', function () {
    return view('home');
})->name('home');
