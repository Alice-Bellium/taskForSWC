<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::resource('events', \App\Http\Controllers\EventController::class);
Route::post('events/join/{event}', [App\Http\Controllers\EventController::class, 'join'])->name('events.join');
Route::post('events/left/{event}', [App\Http\Controllers\EventController::class, 'left'])->name('events.left');

Auth::routes();
