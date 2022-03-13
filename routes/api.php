<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OngkirController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', function (Request $request) {
        return response()->json(User::all());
    });
    Route::post('/cart', [ProductController::class, 'getCart']);
    Route::post('/delete-cart', [ProductController::class, 'deleteCart']);
    Route::post('/destroy-cart', [ProductController::class, 'destroy']);
    Route::post('/change-password', [ProductController::class, 'changepassword']);
    Route::post('/address/create', [ProductController::class, 'postAddress']);
    Route::get('/address/show', [ProductController::class, 'showAddress']);
    Route::post('/address/delete', [ProductController::class, 'destroyAddress']);
    Route::get('/ongkir/province', [OngkirController::class, 'getProvince']);
    Route::post('/getcity', [OngkirController::class, 'getcity']);
    Route::post('/cekongkir', [OngkirController::class, 'cekongkir']);
    Route::post('/post-image', [ProductController::class, 'postImage']);
    Route::post('/post-image', [ProductController::class, 'postImage']);
    Route::post('/invoice', [ProductController::class, 'showInvoice']);
});
