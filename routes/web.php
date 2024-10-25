<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/signUpPage', function () {
    return view('signUpPage');
})->name('signUpPage');

Route::get('/loginPage', function () {
    return view('loginPage');
})->name('loginPage');

Route::get('/loginCompany', function () {
    return view('loginCompany');
})->name('loginCompany');

Route::get('/loginDeveloper', function () {
    return view('loginDeveloper');
})->name('loginDeveloper');
