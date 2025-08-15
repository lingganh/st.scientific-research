<?php

use App\Livewire\CartPage;
use App\Livewire\Login;
use App\Livewire\Home;
use App\Livewire\PostDetail;
use App\Livewire\Posts;
use App\Livewire\ProductDetail;
use App\Livewire\Products;
use App\Livewire\Signup;
use App\Livewire\TestPagination;
use App\Livewire\UserProfile;
use App\Livewire\VerifyOtp;
use App\Livewire\WorkshopDetail;
use App\Livewire\Workshops;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('',Home::class)->name('home');
Route::get('product',Products::class)->name('product');
Route::get('workshop',Workshops::class)->name('workshop');
Route::get('products/{productId?}', ProductDetail::class)->name('product.detail');
Route::get('workshop/{workshop?}', WorkshopDetail::class)->name('workshop.detail');
Route::get('posts', Posts::class)->name('posts');
Route::get('posts/{post?}', PostDetail::class)->name('post.detail');
Route::get('/cart', CartPage::class)->name('cart');

// Login
//Google
Route::get('google/login',[Login::class,'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[Login::class,'handleGoogleCallback'])->name('google.callback');
Route::post('logout',[Login::class,'logout'])->name('logout');



Route::get('login',Login::class)->name('login');
Route::get('signup',Signup::class)->name('signup');
Route::post('/verify-otp', VerifyOtp::class)->name('verify-otp');
//user pro5
Route::get('profile',UserProfile::class)->name('profile.user');
Route::get('/test-livewire', TestPagination::class);
//
