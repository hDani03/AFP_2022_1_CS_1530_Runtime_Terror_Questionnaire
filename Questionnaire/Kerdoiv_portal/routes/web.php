<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KerdoivController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Összes kérdőív mutatása
Route::Get('/kerdoivek', [KerdoivController::class, "index"]);



// Bejelentkezési form
Route::Get("/", [UserController::class, "login"]);

// User bejelentkezés (regisztrált felhasználók)
Route::Post("/users/authenticate", [UserController::class, "authenticate"]);

// User belépés (vendégek)
Route::Post("/users/loginasguest", [UserController::class, "loginasguest"]);



// Regisztrációs form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Bejelentkezési form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Új felhasználó regisztrálása
Route::post('/users', [UserController::class, 'store']);

// Felhasználó kijelentkezés
Route::post("/logout", [UserController::class, "logout"])->middleware("auth");