<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LetsDanceController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [LetsDanceController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('episode/{ld:number}', [LetsDanceController::class, 'show'])->name('ld.show');
