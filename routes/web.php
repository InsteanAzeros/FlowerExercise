<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowerController;
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

Route::get('/login', [FlowerController::class, 'login']);
Route::post('/login', [FlowerController::class, 'authenticated']);

Route::get('/flowers', [FlowerController::class, 'index']);

Route::get('/flowers/create', [FlowerController::class, 'create'])->name('flowers.create')->middleware(EnsureIsLoggedIn::class);

Route::post('/flowers/create', [FlowerController::class, 'store']);

Route::get('/flowers/{id}', [FlowerController::class, 'show'])->name('flowers.details');

Route::get('/flowers/update/{id}', [FlowerController::class, 'edit'])->name('flowers.edit')->middleware(EnsureIsLoggedIn::class);
Route::put('/flowers/update/{id}', [FlowerController::class, 'update']);

// Route::delete('/flowers/delete/{id}', [FlowerController::class, 'destroy'])->name('flowers.delete');
Route::get('/flowers/delete/{id}', [FlowerController::class, 'destroy'])->name('flowers.delete')->middleware(EnsureIsLoggedIn::class);
