<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'TravelsController@index');
Route::get('/index', 'TravelsController@index');
Route::get('/prefecture', 'TravelsController@prefecture');
Route::get('/view', 'TravelsController@view');
Route::get('/create', 'TravelsController@create');
Route::get('/confirm', 'TravelsController@confirm');
Route::get('/edit', 'TravelsController@edit');
Route::post('/complete', 'TravelsController@complete');
Route::get('/user/mypage', 'TravelsController@mypage');
Route::get('/user/mypage/release_flg', 'TravelsController@release_flg');
Route::get('/user/mypage/update-password', 'TravelsController@updatePassword');
Route::view('/user/mypage/delete-account', 'pages.delete-account');
Route::get('/delete-account', 'TravelsController@deleteAccount');

Route::post('/delete-brochure', 'TravelsController@deleteBrochure');
Route::post('/good', 'GoodController@good');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
