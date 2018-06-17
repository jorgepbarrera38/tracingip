<?php


Route::get('ip', 'IpController@index')->name('ip.index')->middleware('permission:ip.index');
Route::post('ip', 'IpController@store')->name('ip.store')->middleware('permission:ip.create');
Route::get('ip/create', 'IpController@create')->name('ip.create')->middleware('permission:ip.create');
Route::get('ip/{ip}/edit', 'IpController@edit')->name('ip.edit')->middleware('permission:ip.edit');
Route::put('ip/{ip}', 'IpController@update')->name('ip.put')->middleware('permission:ip.edit');
Route::delete('ip/{ip}', 'IpController@destroy')->name('ip.destroy')->middleware('permission:ip.destroy');