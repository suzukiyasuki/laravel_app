<?php

use App\Http\Controllers\TopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProductContrller;


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

Auth::routes();
Route::get('', function () {
    return redirect('/top');
});
//一般ユーザー
Route::group(['middleware' => ['auth', 'can:user']], function () {
    //ここにルートを記述
    // パスワードリセット
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');
    Route::resource('users', 'UserController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
    Route::resource('items', 'itemController');

    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/{id}', [CartController::class, 'complete'])->name('complete');
    Route::post('/cart/{id}/remove', [CartController::class, 'remove']);
    Route::post('/top', 'LikeControler@like');
    Route::post('/add-cart', 'CartController@buy');
    Route::post('/count/{id}', [TopController::class, 'count']);
});

// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin']], function () {
    //ここにルートを記述
    Route::get('/admin/{id}', [TopController::class, 'role']);
    Route::post('/admin/{id}/delete', [TopController::class, 'destory']);
});

Route::get('/top', [TopController::class, 'index']);
