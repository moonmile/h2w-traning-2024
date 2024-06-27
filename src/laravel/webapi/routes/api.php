<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\ApiStoreController;
use App\Http\Controllers\ApiCustomerController;
use App\Http\Controllers\ApiOrderController;
use App\Http\Controllers\ApiLoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|-------------------------------------------------------------------------
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
Route::apiResource('orders', ApiOrderController::class);

// カテゴリ slug で検索
Route::get('categories/{category_slug}/slug', [ApiCategoryController::class, 'getbyslug']);
// カテゴリ slug に紐づく商品一覧
Route::get('categories/{category_slug}/products', [ApiCategoryController::class, 'products']);
// 店舗 ID に紐づく商品一覧
Route::get('stores/{store}/products', [ApiStoreController::class, 'products']);
// 店舗 ID に紐づくおすすめ商品一覧
Route::get('stores/{store}/recommendations', [ApiStoreController::class, 'recommendations']);
// 顧客 ID に紐づく注文一覧
Route::get('customers/{customerId}/orders', [ApiCustomerController::class, 'orders']);
// 注文登録
Route::post('orders', [ApiOrderController::class, 'store']);

// ユーザー認証
// Route::apiResource('login', ApiLoginController::class);
Route::get('login', [ApiLoginController::class, 'show']);
Route::post('login', [ApiLoginController::class, 'login']);
