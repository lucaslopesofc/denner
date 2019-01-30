<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('estatistica', 'StatistcController@index')->name('admin.statistic');
    Route::post('estatistica', 'StatistcController@store')->name('admin.statistic.store');

    Route::get('/', 'AdminController@index')->name('admin.home');
});

Route::get('/', 'Site\SiteController@index')->name('home');
Route::get('/sobremim', 'Site\SobreMimController@index')->name('sobremim');
Route::get('/servicos', 'Site\ServicosController@index')->name('servicos');
Route::get('/blog', 'Site\BlogController@index')->name('blog');

Route::get('/depoimentos', 'Site\DepoimentoController@index')->name('depoimento');
Route::post('/depoimentos', 'Site\DepoimentoController@store')->name('depoimento.store');

Route::get('/contato', 'Site\ContatoController@index')->name('contato');

Auth::routes();