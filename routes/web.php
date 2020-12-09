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

Route::get('/vist',function(){
    return View::make('vist');
});

Auth::routes();

Route::get('/producto', 'tienda\producto@page')->name('producto');
Route::get('/categoria', 'tienda\categoria@page')->name('categoria');
Route::get('/cliente', 'tienda\cliente@page')->name('cliente');
Route::get('/domicilio', 'tienda\domicilio@page')->name('domicilio');
Route::get('/home', 'HomeController@index')->name('home');
