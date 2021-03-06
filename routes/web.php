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

Route::get('/register', "RegisterController@index")->middleware('guest');
Route::post("/register", "RegisterController@register");
Route::get("/register/validate/{registerHash}", "RegisterController@verify");

Route::get('/dashboard', "DashboardController@index")->middleware("auth");

Route::get("/internacional",  "RecipientController@international")->name("internacional");
Route::get("/nacional", "RecipientController@national")->name("nacional");

Route::post('/recipients', "RecipientController@recipients")->name("recipients");
Route::get("/SesionShipping","RecipientController@SesionShipping")->name("SesionShipping");
Route::post('/createOrUpdateRecipients', "RecipientController@createOrUpdateRecipients")->name("createOrUpdateRecipients");
Route::get("/SesionShippingInternational","RecipientController@SesionShippingInternational")->name("SesionShippingInternational");
Route::post('/createOrUpdateRecipientsInternational', "RecipientController@createOrUpdateRecipientsInternational")->name("createOrUpdateRecipientsInternational");
Route::post('/getRecipients', "RecipientController@getRecipients")->name("getRecipients");

Route::get('/countries', "CountryController@countries")->name("countries");

Route::get("/cuenta", "AccountController@index");
Route::post("/cuenta/actualizar", "AccountController@update");

Route::get("/forgot-password", "ForgotPasswordController@index")->name("forgot-password");
Route::post("/forgotPasswordReset", "ForgotPasswordController@forgotPasswordReset")->name("forgotPasswordReset");
Route::get("/forgotPassword/reset/{forgotPasswordHash}", "ForgotPasswordController@reset");
Route::post("/reset-password", "ForgotPasswordController@resetPassword")->name("reset-password");

Route::get("/nacional/informacion-de-paquete","PackageInformationController@index");
Route::get("/internacional/informacion-de-paquete","PackageInformationController@indexInternational");
Route::post("/packageInformation","PackageInformationController@packageInformation")->name("packageInformation");
Route::post("/findTypesPackaging","TypePackagingController@findTypesPackaging")->name("findTypesPackaging");

Route::get("/nacional/tarifas-de-envios", "ShipingRatesController@index");
Route::get("/internacional/tarifas-de-envios", "ShipingRatesController@indexInternational");

Route::post("/shipingRates","ShipingRatesController@shipingRates")->name("shipingRates");
Route::get("/nacional/proceso-de-pago", "PaymentProcessController@index");
Route::get("/internacional/proceso-de-pago", "PaymentProcessController@indexInternational");

Route::post("/paymentProcess", "PaymentProcessController@paymentProcess")->name("paymentProcess");

Route::get("nacional/descargas", function(){ return view('download'); });

Route::get("internacional/descargas", function(){ return view('downloadInternational'); });

Route::get("/plan","PlanController@index")->name("plan");
Route::post("/addPlan","PlanController@addPlan")->name("addPlan");

Route::get("/mi-libreta", "MyNotebookController@index");


Route::get("/descargas", function(){ return view('download'); });

Route::get("/declaracion-de-aduanas", function(){ return view('customsDeclaration'); });

/* ADMIN  */
Route::get("/admin/dashboard", "Admin\DashboardController@index");
Route::get("/admin/news/create", "Admin\NewsController@create")->name("admin.news.create");
Route::get("/admin/news/list", "Admin\NewsController@list")->name("admin.news.list");
Route::get("/admin/news/fetch/{page}", "Admin\NewsController@fetch");
Route::get("/admin/news/edit/{id}", "Admin\NewsController@edit");
Route::post("/admin/news/store", "Admin\NewsController@store");
Route::post("/admin/news/update", "Admin\NewsController@update");
Route::post("/admin/news/delete", "Admin\NewsController@delete");
/* ADMIN  */

Route::get("/plan-pro", function(){ return view('planPro'); });
Route::get("/plan-standar", function(){ return view('planStandar'); });

Route::post("/UpdateRecipientsNotebook", "MyNotebookController@UpdateRecipientsNotebook")->name("UpdateRecipientsNotebook");
Route::get("/notificaciones", function(){ return view('notifications'); });
Route::get("/mi-billetera", function(){ return view('myWallet'); });
Route::get("/empaque", "TypePackagingController@index");
Route::post("/addTypesPackaging", "TypePackagingController@store")->name("addTypesPackaging");
Route::post("/updateTypesPackaging", "TypePackagingController@update")->name("updateTypesPackaging");
Route::get("/mis-tiendas", function(){ return view('myStores'); });

Route::get("/envios", function(){ return view('shipments'); });
Route::get("/envios/pendientes", "ShippingController@pendingShippings");

Route::get("/mis-proveedores", function(){ return view('courier'); });
Route::get("/mis-ordenes", function(){ return view('myOrders'); });

Route::get("/admin/couriers", "Admin\CourierController@index");
Route::get("/admin/couriers/fetch/{page}", "Admin\CourierController@fetch");
Route::get("/admin/couriers/all/fetch", "Admin\CourierController@all");
Route::post("/admin/couriers/store", "Admin\CourierController@store");
Route::post("/admin/couriers/update", "Admin\CourierController@update");

Route::get("/admin/zones/index", "Admin\ZoneController@index");
Route::get("/admin/zones/fetch/{page}", "Admin\ZoneController@fetch");
Route::post("/admin/zones/store", "Admin\ZoneController@store");

Route::get("/admin/courier-prices/index", "Admin\CourierPriceController@index");
Route::get("/admin/courier-prices/fetch/{page}", "Admin\CourierPriceController@fetch");
Route::post("/admin/courier-prices/store", "Admin\CourierPriceController@store");

Route::get("/admin/packages/index", "Admin\TypePackageController@index");
Route::get("/admin/packages/fetch/{page}", "Admin\TypePackageController@fetch");
Route::post("/admin/packages/store", "Admin\TypePackageController@store");

