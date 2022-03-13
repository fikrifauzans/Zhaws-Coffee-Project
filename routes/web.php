<?php

use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;



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

Route::get('/', [ProductController::class, 'index']);
Route::get('/user/info', [ProductController::class, 'userinfo']);
Route::get('/user/history', [ProductController::class, 'showHistory']);
Route::get('/product/{product}', [ProductController::class, 'show']);
Route::get('/cart/{id}', [ProductController::class, 'cart']);
Route::get('/product/{product:id}/addtocart', [ProductController::class, 'postcart']);
Route::post('/purchase', [ProductController::class, 'purchase']);
Route::post('/total_purchase', [ProductController::class, 'totalPurchase']);
Route::get('/fix_purchase', [ProductController::class, 'fixPurchase']);
Auth::routes();
Route::prefix('admin')->group(function () {
    Route::get('/product', 'Auth\AdminController@index')->name('admin.HomeProduct');
    Route::get('/product/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/product/{product}', [AdminController::class, 'show'])->name('admin.product');
    Route::post('/product/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/product/edit/{product}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::delete('/product/delete/{product}', [AdminController::class, 'destroy'])->name('admin.delete');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
route::get('/register', function () {
    return view('users.create');
});
