<?php

use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/registrar', [UserRegisterController::class, 'index'])->name("register");
Route::post('/registrar', [UserRegisterController::class, 'store'])->name("register");

Route::get('/login', [UserLoginController::class, 'index'])->name("login");
Route::post('/login', [UserLoginController::class, 'login'])->name("login");

