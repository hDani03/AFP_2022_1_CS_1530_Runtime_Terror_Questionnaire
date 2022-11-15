<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Bejelentkezési form
Route::Get("/", [UserController::class, "login"]);

// User bejelentkezés (regisztrált felhasználók)
Route::Post("/users/authenticate", [UserController::class, "authenticate"]);

// User belépés (vendégek)
Route::Post("/users/loginasguest", [UserController::class, "loginasguest"]);