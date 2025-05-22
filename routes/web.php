<?php

use App\Livewire\Home;
use App\Livewire\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('',Home::class)->name('home');
Route::get('product',Products::class)->name('product');
