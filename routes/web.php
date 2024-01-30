<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;

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
Route::get('/subcategories/{category}', [ServiceController::class, 'category']);//heeeeeeeeeeeeeeeereeeeeeeeeeeeeeeee
Route::get('/promotion', function () {
    return view('client.promotion');
});

Route::get('/details/{id}', [ServiceController::class, 'details']);
Route::get('/promotion/{type}/{category}', [SaleController::class, 'promotions']);
Route::post('/newsletter', [NewsLetterController::class, 'store']);

Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist', [WishlistController::class, 'store']);
    Route::post('/wishlist/{id}', [WishlistController::class, 'destroy']);

    Route::post('/comment', [ReviewController::class, 'store']);
    Route::delete('/comment/{id}', [ReviewController::class, 'destroy']);
});

Route::get('/dashboard', function () {
    if(Auth::user()->hasRole('user')){
        return redirect('/');
    }else{
        return redirect('/categories');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'role:admin']], function(){
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
    Route::get('/sales/add', [SaleController::class, 'create']);
    Route::post('/sales/add', [SaleController::class, 'store']);
    
    Route::get('/newsletter', [NewsLetterController::class, 'index']);
    
    Route::get('/settings', [SettingsController::class, 'index']);
    Route::post('/settings', [SettingsController::class, 'social']);    

    Route::delete('/comment/{id}', [ReviewController::class, 'destroy']);
});

require __DIR__.'/auth.php';
