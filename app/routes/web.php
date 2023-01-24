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
// パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Route::resource('users', 'UserController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
Route::resource('items', 'itemController');

Route::get('/top', [TopController::class, 'index']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/top/{id}', [CartController::class, 'buy'])->name('buy');
Route::post('/cart/{id}', [CartController::class, 'complete'])->name('complete');
Route::post('/top', 'LikeControler@like');
Route::get('/top/{keyword}', [ProductContrller::class, 'show'])->name('posts.index');
// koredeまずつくる

Route::get('/like', function () {
    return view('like');
});
Route::get('/management', function () {
    return view('management');
});
Route::get('/management_user', function () {
    return view('management_user');
});
