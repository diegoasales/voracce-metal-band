<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/members', function () {
    return view('members');
})->name('members');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
