<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register;

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
    Route::get('/register', [Register::class, 'index'])->name('register');
    Route::post('/register/validate', [Register::class, 'register']);
});