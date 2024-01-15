<?php

use App\Http\Controllers\Estate;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('estate', [ EstateController::class, 'index']);
Route::get('estate/create', [ EstateController::class, 'create' ])->name('estate.create');
Route::post('estate/store', [ EstateController::class, 'store' ])->name('estate.store');
Route::get('estate/edit', [ EstateController::class, 'edit' ])->name('estate.edit');
Route::post('estate/update', [ EstateController::class, 'update' ])->name('estate.update');
//Route::resource('estate', EstateController::class);
//For Image
// Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
// Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');

