<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\SettingsController;

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
    return view('client.home');
});

Route::get('/services', [ServiceController::class, 'allServices']);
Route::get('/services/{category}', [ServiceController::class, 'loadByCategory']);
Route::get('/ourproducts', [ServiceController::class, 'loadProducts']);
Route::get('/promotion', function () {
    return view('client.promotion');
});
Route::get('/wishlist', function () {
    return view('client.wishlist');
});
Route::get('/details/{id}', [ServiceController::class, 'details']);
Route::get('/promotion/{type}/{category}', [SaleController::class, 'promotions']);
Route::post('/newsletter', [NewsLetterController::class, 'store']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories/create', [CategoryController::class, 'store']);
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);
Route::put('/categories/edit/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products/create', [ProductController::class, 'store']);
Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
Route::put('/products/edit/{id}', [ProductController::class, 'update']);
Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);

Route::get('/sales', [SaleController::class, 'index']);
Route::get('/sales/create/{id}', [SaleController::class, 'edit']);
Route::post('/sales/create/{id}', [SaleController::class, 'update']);
Route::delete('/sales/delete/{id}', [SaleController::class, 'destroy']);

Route::get('/newsletter', [NewsLetterController::class, 'index']);

Route::get('/settings', [SettingsController::class, 'index']);
Route::post('/settings', [SettingsController::class, 'social']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
