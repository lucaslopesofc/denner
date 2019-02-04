<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    // Depoimentos Aprovados
    Route::get('depoimentos/aprovados', 'ApprovedController@index')->name('admin.testimony.approved');
    Route::delete('depoimento/aprovados/{id}', 'ApprovedController@destroy')->name('admin.testimony.approved.destroy');

    // Depoimentos Pendentes
    Route::get('depoimentos/pendentes', 'PendingController@index')->name('admin.testimony.pending');
    Route::post('depoimento/pendentes/{id}', 'PendingController@update')->name('admin.testimony.pending.update');
    Route::delete('depoimento/pendentes/{id}', 'PendingController@destroy')->name('admin.testimony.pending.destroy');

    // Estatísticas da Página Sobre Mim
    Route::get('estatistica', 'StatistcController@index')->name('admin.statistic');
    Route::post('estatistica', 'StatistcController@store')->name('admin.statistic.store');

    // Página Inicial do Administrador
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