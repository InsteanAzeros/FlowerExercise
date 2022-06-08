<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
use App\Http\Middleware\EnsureIsLoggedIn;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\EnsureUserIsLoggedIn;

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

// API ROUTES
Route::get('/api/flowers', [ApiController::class, 'index']);
Route::get('/api/amount/{amount}', [ApiController::class, 'amount']);
Route::get('/api/type/{type}', [ApiController::class, 'type']);
Route::get('/api/flowers/{amount}/{type}', [ApiController::class, 'amountType']);


// APPLICATION ROUTES

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authenticated']);

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'register_submit']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/flowers', [FlowerController::class, 'index']);

Route::get('/flowers/create', [FlowerController::class, 'create'])->name('flowers.create')->middleware(EnsureIsLoggedIn::class);

Route::post('/flowers/create', [FlowerController::class, 'store']);

Route::get('/flowers/{id}', [FlowerController::class, 'show'])->name('flowers.details');

Route::get('/flowers/update/{id}', [FlowerController::class, 'edit'])->name('flowers.edit')->middleware(EnsureIsLoggedIn::class);
Route::put('/flowers/update/{id}', [FlowerController::class, 'update']);

// Route::delete('/flowers/delete/{id}', [FlowerController::class, 'destroy'])->name('flowers.delete');
Route::get('/flowers/delete/{id}', [FlowerController::class, 'destroy'])->name('flowers.delete')->middleware(EnsureIsLoggedIn::class);
