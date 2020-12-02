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

Route::group(['prefix'=>'api'], function(){
    Route::apiResource('cliente','create_cliente@store');
    Route::apiResource('productos','productos@store');
    Route::apiResource('gestor','gestor@store');
    Route::apiResource('domicilio','domicilio@store');

    });
