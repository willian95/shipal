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

Route::get("/internacional",  "RecipientController@international")->name("internacional");
Route::get("/nacional", "RecipientController@national")->name("nacional");

Route::post('/recipients', "RecipientController@recipients")->name("recipients");
Route::get("/SesionShipping","RecipientController@SesionShipping")->name("SesionShipping");
Route::post('/createOrUpdateRecipients', "RecipientController@createOrUpdateRecipients")->name("createOrUpdateRecipients");
Route::post('/createOrUpdateRecipientsInternational', "RecipientController@createOrUpdateRecipientsInternational")->name("createOrUpdateRecipientsInternational");
Route::post('/getRecipients', "RecipientController@getRecipients")->name("getRecipients");

Route::get('/countries', "CountryController@countries")->name("countries");

Route::get("/cuenta", "AccountController@index");
Route::post("/cuenta/actualizar", "AccountController@update");

Route::get("/forgot-password", "ForgotPasswordController@index")->name("forgot-password");
Route::post("/forgotPasswordReset", "ForgotPasswordController@forgotPasswordReset")->name("forgotPasswordReset");
Route::get("/forgotPassword/reset/{forgotPasswordHash}", "ForgotPasswordController@reset");
Route::post("/reset-password", "ForgotPasswordController@resetPassword")->name("reset-password");

Route::get("/informacion-de-paquete","PackageInformationController@index")->name("informacion-de-paquete");
Route::post("/packageInformation","PackageInformationController@packageInformation")->name("packageInformation");
Route::post("/findTypesPackaging","TypePackagingController@findTypesPackaging")->name("findTypesPackaging");

Route::get("/tarifas-de-envios", "ShipingRatesController@index")->name("tarifas-de-envios");
Route::post("/shipingRates","ShipingRatesController@shipingRates")->name("shipingRates");
Route::get("/proceso-de-pago", function(){ return view('paymentProcess'); });
Route::get("/descargas", function(){ return view('download'); });

Route::get("/plan", function(){ return view('plan'); });

Route::get("/declaracion-de-aduanas", function(){ return view('customsDeclaration'); });


Route::get("/plan-pro", function(){ return view('planPro'); });
Route::get("/plan-standar", function(){ return view('planStandar'); });
Route::get("/mi-libreta", function(){ return view('myNotebook'); });
Route::get("/notificaciones", function(){ return view('notifications'); });
Route::get("/mi-billetera", function(){ return view('myWallet'); });
Route::get("/empaque", function(){ return view('packaging'); });
