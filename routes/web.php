<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::resource('events', \App\Http\Controllers\EventController::class);

Auth::routes();
