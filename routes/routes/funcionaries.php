<?php

Route::get('funcionaries', 'FuncionaryController@index')->name('funcionaries.index')->middleware('permission:funcionaries.index');
Route::post('funcionaries', 'FuncionaryController@store')->name('funcionaries.store')->middleware('permission:funcionaries.create');
Route::get('funcionaries/create', 'FuncionaryController@create')->name('funcionaries.create')->middleware('permission:funcionaries.create');
Route::delete('funcionaries/{funcionary}', 'FuncionaryController@destroy')->name('funcionaries.destroy')->middleware('permission:funcionaries.destroy');