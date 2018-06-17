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


Route::group(['middleware'=>'auth'], function(){
    Route::view('/', 'dashboard')->name('dashboard');
    //Ubicaciones
    require(__DIR__.'\routes\ubications.php');
    //Dependencias
    require(__DIR__.'\routes\dependences.php');
    //Ip
    require(__DIR__.'\routes\ip.php');
    //Funcionaries
    require(__DIR__.'\routes\funcionaries.php');
    //Usuarios
    require(__DIR__.'\routes\users.php');
});

//Login

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');