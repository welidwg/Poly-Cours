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
Route::get('/Dash', function () {
    return view('Dash/main');
});
Route::get('/Dash/Profile', function () {
    return view('Dash/profile');
});
Route::get('/Dash/AjouterCour', function () {
    return view('Dash/courAdd');
});
Route::get('/GetToken', function () {
    return csrf_token();
});

//user
Route::get('/Logout', "App\Http\Controllers\UserController@Logout");
Route::post('/Connexion', "App\Http\Controllers\UserController@Login");
Route::post('/ChangeAvatar', "App\Http\Controllers\UserController@ChangeAvatar");
Route::post('/VerifyMail', "App\Http\Controllers\UserController@VerifyMail");
Route::post('/Logging', "App\Http\Controllers\UserController@Login");
Route::post('/SignUp', "App\Http\Controllers\UserController@SignUp");
Route::post('/First', "App\Http\Controllers\UserController@FirstLogin");
Route::post('/EditProfile', "App\Http\Controllers\UserController@EditProfile");



//cours
Route::post('/AddCour', "App\Http\Controllers\CourController@AddCour");
