<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Http\Request;
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
Route::get('/', [ProductController::class, 'display']);


//Search
Route::get('/search', [ProductController::class, 'search']);


Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home')->middleware('verified');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//Route for admin
Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/products', [ProductController::class, 'list'])->name('products.list');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::get('/dashboard', [ProductController::class, 'index'])->name('display');
     //Cart routes
    // Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // Route::get('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');


    Route::get('add-to-cart/{id}', [OrderController::class, 'addToCart'])->name('add_to_cart');





    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');




});

// Route::get('/workspace', function () {
//     return view('workspace');
// });
 
// Route::get('/cart', 'CartController@index')->name('cart.blade.php');


require __DIR__.'/auth.php'; 
