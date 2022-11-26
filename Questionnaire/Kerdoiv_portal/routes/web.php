<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;

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

// ÁLTALÁNOS ERŐFORRÁS ÚTVONALAK:
// index - Összes kérdőív mutatása
// show - Egy kérdőív mutatása
// create - Kérdőív létrehozás form mutatása
// store - Új kérdőív tárolása
// edit - Kérdőív módosítás form mutatása
// update - Kérdőív frissítése
// destroy - Kérdőív törlése


// KÉRDŐÍVEKKEL KAPCSOLATOS ÚTVONALAK

// Összes kérdőív listázása
Route::get('/', [SurveyController::class, 'index']);

// Kérdőív létrehozása
Route::post('/surveys', [SurveyController::class, 'store'])->middleware('auth');

// Kérdőív létrehozása form megjelenítése
Route::get('/surveys/create', [SurveyController::class, 'create'])->middleware('auth');



// FELHASZNÁLÓVAL KAPCSOLATOS ÚTVONALAK

// Regisztrációs form megjelenítése
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Új felhasználó létrehozása
Route::post('/users', [UserController::class, 'store']);

// Felhasználó kijelentkeztetése
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Bejelentkező form megjelenítése
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Felhasználó bejelentkeztetés
Route::post('/users/authenticate', [UserController::class, 'authenticate']);










// Egy kérdőív listázása (legalul van a helye)
Route::get('/surveys/{survey}', [SurveyController::class, 'show']);