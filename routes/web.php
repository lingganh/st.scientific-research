<?php

use App\Livewire\Login;
use App\Livewire\Home;
use App\Livewire\Products;
use App\Livewire\Signup;
use App\Livewire\Workshop;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('',Home::class)->name('home');
Route::get('product',Products::class)->name('product');
Route::get('workshop',Workshop::class)->name('workshop');

// Login
//Google
Route::get('google/login',[Login::class,'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[Login::class,'handleGoogleCallback'])->name('google.callback');

Route::get('login',Login::class)->name('login');
Route::get('signup',Signup::class)->name('signup');

