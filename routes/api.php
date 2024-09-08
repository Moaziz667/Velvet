<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RatesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\CartController;

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













Route::middleware(['auth','admin'])->group(function(){
Route::get('/AllProducts',[AdminController::class,'getProducts']);
});

Route::middleware(['auth:sanctum'])->group(function(){
    
    Route::get('products/count',[CartController::class,'count'])->name('products.count');
    Route::apiResource('products',CartController::class);
    Route::post('products/increase/{id}',[CartController::class,'increase']);
    Route::post('products/decrease/{id}',[CartController::class,'decrease']);
    Route::get('/user', function (Request $request) {
    return $request->user();
});

});
Route::get('/allProducts',[ProductController::class , 'allProducts']);
Route::get('/rate/{product_id}',[RatesController::class,'getRate']);
    Route::post('/rate',[RatesController::class,'setRate']);

