<?php

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

// koredeまずつくる
Route::get('/', function () {
    return view('top');
});

Route::get('/item_detail', function () {
    return view('detail');
});
Route::get('/top', function () {
    return view('top');
});
Route::get('/top_login', function () {
    return view('top_login');
});
Route::get('/like', function () {
    return view('like');
});
// Route::get('/register', function () {
//     return view('register');
// });
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/complete', function () {
    return view('complete');
});
Route::get('/detail_mypage', function () {
    return view('detail_mypage');
});
Route::get('/edit_mypage', function () {
    return view('edit_mypage');
});
Route::get('/addition', function () {
    return view('addition');
});
Route::get('/edit_item', function () {
    return view('edit_item');
});
Route::get('/management', function () {
    return view('management');
});
Route::get('/management_user', function () {
    return view('management_user');
});

