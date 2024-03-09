<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BlogCategoryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CardTransactionController;

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

Route::controller(AuthController::class)->prefix('auth')->name('api.auth.')->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/refresh', 'refresh')->name('refresh');
    Route::post('/change-password', 'changePassWord')->name('changePassWord');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(SliderController::class)->prefix('slider')->name('api.slider.')->group(function () {
    Route::get('/list', 'index')->name('index');
});

Route::controller(CategoryController::class)->prefix('category')->name('api.category.')->group(function () {
    Route::get('/list', 'index')->name('index');
    Route::get('/{id}/detail', 'detail')->name('detail');
});

Route::controller(BlogCategoryController::class)->prefix('blog-category')->name('api.blog_category.')->group(function () {
    Route::get('/list', 'index')->name('index');
    Route::get('/{id}/detail', 'detail')->name('detail');
});

Route::controller(CardTransactionController::class)->prefix('card-transaction')->name('api.card_transaction.')->group(function () {
    Route::get('/list', 'index')->name('index');
});

