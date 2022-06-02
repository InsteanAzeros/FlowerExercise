<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowerController;
use Illuminate\Support\Facades\Storage;

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

Route::get('/test', function () {
    $file_content = Storage::get('MOCK_DATA.json');
    // $file_content = file_get_contents('MOCK_DATA.json');
    $movies = json_decode($file_content);
    dd($movies);
});




Route::get('/flowers', [FlowerController::class, 'index']);

Route::get('/flowers/create', [FlowerController::class, 'create'])->name('flowers.create');
Route::post('/flowers/create', [FlowerController::class, 'store']);

Route::get('/flowers/update/{id}', [FlowerController::class, 'edit'])->name('flowers.edit');
Route::put('/flowers/update/{id}', [FlowerController::class, 'update']);

// Route::delete('/flowers/delete/{id}', [FlowerController::class, 'destroy'])->name('flowers.delete');
Route::get('/flowers/delete/{id}', [FlowerController::class, 'destroy'])->name('flowers.delete');
