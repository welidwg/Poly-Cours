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

Route::get('/', function () {
    return view('Main/index');
});
Route::get('/Register', function () {
    return view('Main/register');
});

Route::get('/Login', function () {
    return view('Main/login');
});

Route::get('/Contact', function () {
    return view('Main/contact');
});
Route::get('/About', function () {
    return view('Main/about');
});
Route::get('/GetToken', function () {
    return csrf_token();
});

Route::post('/Connexion', "App\Http\Controllers\UserController@Login");
Route::post('/VerifyMail', "App\Http\Controllers\UserController@VerifyMail");
Route::post('/Logging', "App\Http\Controllers\UserController@Login");

Route::post('/SignUp', "App\Http\Controllers\UserController@SignUp");
Route::post('/First', "App\Http\Controllers\UserController@FirstLogin");
Route::post('/EditProfile', "App\Http\Controllers\UserController@EditProfile");
