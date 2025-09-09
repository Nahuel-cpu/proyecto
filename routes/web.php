<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Client\SaleController as ClientSaleController;
use App\Http\Controllers\Client\ClientController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/",[PublicController::class,'index']);
Route::get("/empresa",[PublicController::class,'empresa']);

//rutas del admin
Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function(){

    Route::get('/dashboard', [HomeController::class,'adminDashboard'])->name('dashboard');

    Route::resource('user',UserController::class);

    Route::resource('cars', controller: CarController::class);

Route::resource('sales', controller: SaleController::class);


});

Route::prefix('cliente')->middleware(['auth','role:cliente'])->group(function(){
    Route::get('/dashboard', [HomeController::class,'clienteDashboard'])->name('cliente.dashboard');
    Route::get('/cars', [ClientController::class, 'cars'])->name('cliente.cars');

    Route::post('/client/purchase/{car}', [ClientSaleController::class, 'purchase'])->name('cliente.purchase');
    Route::post('/client/cancel-purchase', [ClientSaleController::class, 'cancel'])->name('cliente.cancel');
});