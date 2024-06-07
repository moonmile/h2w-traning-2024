<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\ApiStoreController;
use App\Http\Controllers\ApiCustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', ApiProductController::class);
Route::apiResource('categories', ApiCategoryController::class);
Route::apiResource('stores', ApiStoreController::class);
Route::apiResource('customers', ApiCustomerController::class);

// カテゴリ slug に紐づく商品一覧
Route::get('categories/{category_slug}/products', [ApiCategoryController::class, 'products']);
