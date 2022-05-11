<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 
Route::get('subs', function () {
    if (Gate::allows('subs-only', Auth::user())) {
        return view('subs');
    }else{
        return 'You are not a subscriber';
    }
});