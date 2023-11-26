<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register;
use App\Http\Controllers\Login;
use App\Http\Controllers\Main;
use App\Http\Controllers\Authentication;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/Auth/{page}', [Authentication::class, 'index']);
    Route::post('/register/validate', [Authentication::class, 'register']);
    Route::post('/login/validate', [Authentication::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Main::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [Authentication::class, 'logout'])->name('logout');
});