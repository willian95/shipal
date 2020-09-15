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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', "LoginController@index")->name("/")->middleware('guest');
Route::get("/logout", "LoginController@logout");
Route::post("/login", "LoginController@login");

Route::get('/register', "RegisterController@index");
Route::post("/register", "RegisterController@register");
Route::get("/register/validate/{registerHash}", "RegisterController@verify");

Route::get('/dashboard', "DashboardController@index")->middleware("auth");

Route::get("/internacional",  "RecipientController@international");
Route::get("/nacional", "RecipientController@national");

Route::post('/recipients', "RecipientController@recipients")->name("recipients");
Route::post('/createOrUpdateRecipients', "RecipientController@createOrUpdateRecipients")->name("createOrUpdateRecipients");
Route::post('/getRecipients', "RecipientController@getRecipients")->name("getRecipients");

Route::get('/countries', "CountryController@countries")->name("countries");

Route::get("/cuenta", "AccountController@index");
Route::post("/cuenta/actualizar", "AccountController@update");

Route::get("/plan", function(){ return view('plan'); });
