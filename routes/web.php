<?php

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){
    return view("index");
})->name("home");

Route::middleware("guest")->group(function () {
    Route::get('registrar', [UserRegisterController::class, 'index'])->name("register");
    Route::post('registrar', [UserRegisterController::class, 'store'])->name("register");
    
    Route::get('login', [UserLoginController::class, 'index'])->name("login");
    Route::post('login', [UserLoginController::class, 'login'])->name("login");
});


Route::middleware("auth")->prefix("dashboard")->group(function () {
    Route::get("/", [LibraryController::class, 'index'])->name('dashboard');
    Route::post("logout", [UserLoginController::class, 'logout'])->name('logout');
    Route::get("cadastrar", [LibraryController::class, 'registerBook'])->name('book-register');
    Route::post("cadastrar", [LibraryController::class, 'store'])->name('book-register');
    Route::get("livros", [LibraryController::class, 'showBooks'])->name('book-show');
    Route::get("editar/{id}", [LibraryController::class, 'editBook'])->name('book-edit');
    Route::post("editar/{id}", [LibraryController::class, 'update'])->name('book-edit');
    Route::get("remover/{id}", [LibraryController::class, 'destroy'])->name('book-delete');
});

