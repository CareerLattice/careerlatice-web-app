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