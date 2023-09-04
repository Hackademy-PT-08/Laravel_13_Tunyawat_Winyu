<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrederController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\ProfileEditController;

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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');



// Route Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware(['verified'])->name('profile');
Route::get('/profile', [ProfileController::class, 'painting'])->middleware(['verified'])->name('profile');
// Route Edit Information Profile
Route::get('/profile/edit', [ProfileEditController::class, 'index'])->name('edit.information');

// Route Edit Post
Route::get('/post/edit/{id}', [PaintingController::class, 'edit'])->name('paintingsInfo.edit');
// Route Update Post
Route::put('/post/edit/{id}', [PaintingController::class, 'update'])->name('paintingsInfo.update');
// Route delete Post
Route::delete('/post/delete/{id}', [PaintingController::class, 'destroy'])->name('paintingsInfo.delete');


// Route Add Paintings
Route::get('/paintings/add', [PaintingController::class, 'create'])->name('addPaintings.create');
Route::post('/paintings/add', [PaintingController::class, 'store'])->name('addPaintings.store');

// Route Checkout
Route::get('/paintings/checkout/{id}', [PaintingController::class, 'checkout'])->name('painting.checkout');
Route::post('/paintings/checkout/{id}', [PaintingController::class, 'doCheckout'])->name('painting.do.checkout');

Route::post('/painting/checkout/{id}', [OrderController::class, 'checkoutOrders'])->name('order.checkout');

// Route Categories

Route::get('/post/category/{id}', [CategoryController::class, 'show'])->name('post.category');
