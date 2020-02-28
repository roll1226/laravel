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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userLogin', function () {
    return view('userLogin');
});

Route::get('/userRegist', function () {
    return view('userRegist', ['ret' => 1]);
});

Route::get('/userShow', function () {
    return view('userShow', ['userDate' => []]);
});

Route::post('/userAdd', 'UsersController@userInsert');
Route::post('/userShow', 'UsersController@selectUsers');
Route::post('/deleteUser', 'UsersController@deleteUser');
Route::post('/userDelete', 'UsersController@userDelete');

Route::post('/isLogin', 'UsersController@userLogin');
