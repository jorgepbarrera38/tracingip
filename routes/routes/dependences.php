<?php

Route::get('dependences', 'DependenceController@index')->name('dependences.index')->middleware('permission:dependences.index');
Route::post('dependences', 'DependenceController@store')->name('dependences.store')->middleware('permission:dependences.create');
Route::get('dependences/create', 'DependenceController@create')->name('dependences.create')->middleware('permission:dependences.create');
Route::delete('dependences/{dependence}', 'DependenceController@destroy')->name('dependences.destroy')->middleware('permission:dependences.destroy');