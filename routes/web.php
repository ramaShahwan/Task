<?php

use App\Http\Controllers\Estate;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/', [ EstateController::class, 'index'])->name('visitor.estate');


Route::get('/dashboard', function () {
   
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




if (optional(auth()->user())->role == 'admin') 
{
    Route::get('/home', function () {
        return view('components.index');
    })->middleware(['auth', 'verified'])->name('home');
}
 elseif (optional(auth()->user())->role == 'customer')
  {
    Route::get('/home', function () {
        return view('customer.index');
    })->middleware(['auth', 'verified'])->name('home');
}


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth', 'customer')->group(function () {

   Route::get('estate/customer', [ EstateController::class, 'index'])->name('customer.estate');
   Route::get('estate/customer/create', [ EstateController::class, 'create' ])->name('customerEestate.create');
   Route::post('estate/customer/store', [ EstateController::class, 'store' ])->name('customerEstate.store');
   Route::get('estate/customer/edit/{id}', [ EstateController::class, 'edit' ])->name('customerEstate.edit');
   Route::put('estate/customer/update/{id}', [ EstateController::class, 'update' ])->name('customerEstate.update');
   Route::get('estate/customer/delete/{id}', [ EstateController::class, 'destroy' ])->name('customerEstate.delete');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('estate', [ EstateController::class, 'index'])->name('estate');
    Route::get('estate/create', [ EstateController::class, 'create' ])->name('estate.create');
    Route::post('estate/store', [ EstateController::class, 'store' ])->name('estate.store');
    Route::get('estate/edit/{id}', [ EstateController::class, 'edit' ])->name('estate.edit');
    Route::put('estate/update/{id}', [ EstateController::class, 'update' ])->name('estate.update');
   // Route::put('estate/updateImage/{id}', [ EstateController::class, 'updateImage' ])->name('estate.updateImage');
    Route::get('estate/delete/{id}', [ EstateController::class, 'destroy' ])->name('estate.delete');
    Route::get('estate/deleteAll', [ EstateController::class, 'deleteAll' ])->name('estate.deleteAll');
});


require __DIR__.'/auth.php';


// Route::get('estate', [ EstateController::class, 'index'])->name('estate');
// Route::get('estate/create', [ EstateController::class, 'create' ])->name('estate.create');
// Route::post('estate/store', [ EstateController::class, 'store' ])->name('estate.store');
// Route::get('estate/edit/{id}', [ EstateController::class, 'edit' ])->name('estate.edit');
// Route::put('estate/update/{id}', [ EstateController::class, 'update' ])->name('estate.update');
// Route::put('estate/updateImage/{id}', [ EstateController::class, 'updateImage' ])->name('estate.updateImage');
// Route::get('estate/delete/{id}', [ EstateController::class, 'destroy' ])->name('estate.delete');
// Route::get('estate/deleteAll', [ EstateController::class, 'deleteAll' ])->name('estate.deleteAll');


//Route::resource('estate', EstateController::class);

