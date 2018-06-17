<?php

Route::get('ubications', 'UbicationController@index')->name('ubications.index')->middleware('permission:ubications.index');
Route::post('ubications', 'UbicationController@store')->name('ubications.store')->middleware('permission:ubications.create');
Route::get('ubications/create', 'UbicationController@create')->name('ubications.create')->middleware('permission:ubications.create');
Route::delete('ubications/{ubication}', 'UbicationController@destroy')->name('ubications.destroy')->middleware('permission:ubications.destroy');