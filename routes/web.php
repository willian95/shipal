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

Route::get('/', "LoginController@index")->name("/");
Route::get("/logout", "LoginController@logout");
Route::post("/login", "LoginController@login");

Route::get('/register', "RegisterController@index");
Route::post("/register", "RegisterController@register");
Route::get("/register/validate/{registerHash}", "RegisterController@verify");

Route::get('/dashboard', "DashboardController@index")->middleware("auth");

Route::get("/internacional", function(){ return view('international'); });
Route::get("/nacional", function(){ return view('national'); });

Route::get("/cuenta", function(){ return view('account'); });