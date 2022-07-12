<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use Illuminate\Contracts\Session\Session;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session()->forget('user');
    return redirect('login');
});

Route::view('/register', 'register');
Route::post("/login", [UserController::class, 'login']);
Route::post("/register", [UserController::class, 'register']);
Route::get("/", [ProductController::class, 'index']);
Route::get("detail/{id}", [ProductController::class, 'detail']);
Route::get("search", [ProductController::class, 'search']);
Route::post("add_to_cart", [ProductController::class, 'addToCart']);
Route::get("cartlist", [ProductController::class, 'cartList']);
Route::get("removecart/{id}", [ProductController::class, 'removeCart']);
Route::get("ordernow", [ProductController::class, 'orderNow']);
Route::post("orderplace", [ProductController::class, 'orderPlace']);
Route::get("myorders", [ProductController::class, 'myOrders']);
Route::post("buynow", [ProductController::class, 'buyNow']);
Route::get("allproducts", [ProductController::class, 'allProducts']);
Route::view('/upload', 'upload');
Route::view('/thankyou', 'thankyou');
Route::get("admin", [ProductController::class, 'admin'])->name('admin');
Route::get("removeproduct/{id}", [ProductController::class, 'removeProduct']);
Route::post("upload", [ProductController::class, 'upload']);
//Route::post("payments", [ProductController::class, 'payments']);

Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('payment-process', [StripeController::class, 'process']);
