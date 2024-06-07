<?php

use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){
    return view("index");
})->name("home");

Route::get('registrar', [UserRegisterController::class, 'index'])->name("register");
Route::post('registrar', [UserRegisterController::class, 'store'])->name("register");
Route::get("/", function(){
    return view("index");
})->name("home");

Route::get('registrar', [UserRegisterController::class, 'index'])->name("register");
Route::post('registrar', [UserRegisterController::class, 'store'])->name("register");

Route::get('login', [UserLoginController::class, 'index'])->name("login");
Route::post('login', [UserLoginController::class, 'login'])->name("login");

Route::middleware("auth")->prefix("dashboard")->group(function () {
    Route::get("/", [BibliotecaController::class, 'index'])->name('dashboard');
    Route::get("logout", [UserLoginController::class, 'logout'])->name('logout');
    Route::get("cadastrar", [BibliotecaController::class, 'registerBook'])->name('book-register');
    Route::post("cadastrar", [BibliotecaController::class, 'store'])->name('book-register');
    Route::get("livros", [BibliotecaController::class, 'showBooks'])->name('book-show');
    Route::get("editar/{id}", [BibliotecaController::class, 'editBook'])->name('book-edit');
    Route::post("editar/{id}", [BibliotecaController::class, 'update'])->name('book-edit');
    Route::get("remover/{id}", [BibliotecaController::class, 'destroy'])->name('book-delete');
});

