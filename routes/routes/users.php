<?php

Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
Route::post('users', 'UserController@store')->name('users.store')->middleware('permission:users.create');
Route::get('users/create', 'UserController@create')->name('users.create')->middleware('permission:users.create');
Route::get('users/{user}', 'UserController@show')->name('users.show')->middleware('permission:users.show');
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');
Route::put('users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');



