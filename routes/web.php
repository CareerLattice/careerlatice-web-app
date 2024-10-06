<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/signUp', function () {
    return view('signUpPage');
});

Route::get('/HomePage', function () {
    return view('homePage');
});
