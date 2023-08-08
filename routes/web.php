<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;




Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () { return view('index'); })->name('index');

Route::controller(loginController::class)->group(function(){
    Route::get('/login', 'getLogin')->name('login');
    Route::post('/login/save', 'login')->name('ingresar');
    Route::get('/logout', 'logout')->name('logout');

});

Route::controller(dashboardController::class)->group(function(){
    Route::get('/dashboard', 'getDashboard')->name('dashboard');
    Route::get('get-pesos-semanas', 'getPesosSemanas')->name('getPesosSemanas');
    Route::get('get-pesos-meses', 'getPesosMeses')->name('getPesosMeses');
    Route::get('get-calorias-semanas', 'getCaloriasSemanas')->name('getCaloriasSemanas');
    Route::get('get-calorias-meses', 'getCaloriasMeses')->name('getCaloriasMeses');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
