<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    // Sliders
    Route::get('sliders', 'SliderController@index')->name('admin.slider');
    Route::get('sliders/novo', 'SliderController@create')->name('admin.slider.create');
    Route::post('sliders/novo', 'SliderController@store')->name('admin.slider.store');
    Route::delete('sliders/{id}', 'SliderController@destroy')->name('admin.slider.destroy');
    Route::get('sliders/editar/{id}', 'SliderController@edit')->name('admin.slider.edit');
    Route::post('sliders/{id}', 'SliderController@update')->name('admin.slider.update');

    // Depoimentos Aprovados
    Route::get('depoimentos/aprovados', 'ApprovedController@index')->name('admin.testimony.approved');
    Route::delete('depoimento/aprovados/{id}', 'ApprovedController@destroy')->name('admin.testimony.approved.destroy');

    // Depoimentos Pendentes
    Route::get('depoimentos/pendentes', 'PendingController@index')->name('admin.testimony.pending');
    Route::post('depoimento/pendentes/{id}', 'PendingController@update')->name('admin.testimony.pending.update');
    Route::delete('depoimento/pendentes/{id}', 'PendingController@destroy')->name('admin.testimony.pending.destroy');

    // Configurações de Páginas
    Route::get('configuracoes/paginas', 'PageController@index')->name('admin.config.pages');
    Route::get('configuracoes/paginas/editar/{id}', 'PageController@edit')->name('admin.config.pages.edit');
    Route::post('configuracoes/paginas/{id}', 'PageController@update')->name('admin.config.pages.update');

    //Configurações de Informações
    Route::get('configuracoes/informacoes', 'InformationController@index')->name('admin.config.info');
    Route::post('configuracoes/informacoes/{id}', 'InformationController@update')->name('admin.config.info.update');

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