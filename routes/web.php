<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('admin/registry', [App\Http\Controllers\AdminController::class, 'registry'])->name('admin.registry');
Route::get('admin/users', [App\Http\Controllers\UsersController::class, 'users'])->name('admin.users');
Route::get('admin/events', [App\Http\Controllers\EventController::class, 'events'])->name('admin.events');

Route::resource('users', \App\Http\Controllers\UsersController::class);
Route::resource('events', \App\Http\Controllers\EventController::class);
Route::post('events/join/{event}', [App\Http\Controllers\EventController::class, 'join'])->name('events.join');
Route::post('events/left/{event}', [App\Http\Controllers\EventController::class, 'left'])->name('events.left');

Auth::routes();
