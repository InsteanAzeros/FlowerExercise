<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowerController;

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

Route::get('/flowers', [FlowerController::class, 'index']);

Route::get('/flowers/create', [FlowerController::class, 'create'])->name('flowers.create');
Route::post('/flowers/create', [FlowerController::class, 'store']);

Route::get('/flowers/update/{id}', [FlowerController::class, 'edit'])->name('flowers.edit');
Route::put('/flowers/update/{id}', [FlowerController::class, 'update']);

// Route::delete('/flowers/delete/{id}', [FlowerController::class, 'destroy'])->name('flowers.delete');
Route::get('/flowers/delete/{id}', [FlowerController::class, 'destroy'])->name('flowers.delete');