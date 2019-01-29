<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('estatistica', 'StatistcController@index')->name('admin.statistic');
    Route::post('estatistica', 'StatistcController@store')->name('admin.statistic.store');

    Route::get('/', 'AdminController@index')->name('admin.home');
});

Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();