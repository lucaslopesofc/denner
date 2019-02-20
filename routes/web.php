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

    // Configurações de Usuário
    Route::get('configuracoes/usuario', 'UserController@index')->name('admin.config.user');
    Route::post('configuracoes/usuario/{id}', 'UserController@update')->name('admin.config.user.update');

    // Estatísticas da Página Sobre Mim
    Route::get('estatistica', 'StatistcController@index')->name('admin.statistic');
    Route::post('estatistica', 'StatistcController@store')->name('admin.statistic.store');

    // Serviços
    Route::get('servicos', 'ServiceController@index')->name('admin.service');
    Route::get('servicos/novo', 'ServiceController@create')->name('admin.service.create');
    Route::post('servicos/novo', 'ServiceController@store')->name('admin.service.store');
    Route::delete('servicos/{id}', 'ServiceController@destroy')->name('admin.service.destroy');
    Route::get('servicos/editar/{id}', 'ServiceController@edit')->name('admin.service.edit');
    Route::post('servicos/{id}', 'ServiceController@update')->name('admin.service.update');

    // Postagem
    Route::get('blog/postagens', 'PostController@index')->name('admin.post');
    Route::get('blog/postagens/novo', 'PostController@create')->name('admin.post.create');
    Route::post('blog/postagens/novo', 'PostController@store')->name('admin.post.store');
    Route::delete('blog/postagens/{id}', 'PostController@destroy')->name('admin.post.destroy');
    Route::get('blog/postagens/editar/{id}', 'PostController@edit')->name('admin.post.edit');
    Route::post('blog/postagens/editar/{id}', 'PostController@update')->name('admin.post.update');

    // Categorias
    Route::get('blog/categorias', 'CategoryController@index')->name('admin.category');
    Route::post('blog/categorias', 'CategoryController@store')->name('admin.category.store');
    Route::delete('blog/categorias/{id}', 'CategoryController@destroy')->name('admin.category.destroy');
    Route::get('blog/categorias/editar/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::post('blog/categorias/editar/{id}', 'CategoryController@update')->name('admin.category.update');

    // Página Inicial do Administrador
    Route::get('/', 'AdminController@index')->name('admin.home');
});

Route::get('/', 'Site\SiteController@index')->name('home');
Route::get('/sobremim', 'Site\SobreMimController@index')->name('sobremim');
Route::get('/servicos', 'Site\ServicosController@index')->name('servicos');

Route::get('/blog', 'Site\BlogController@index')->name('blog');
Route::get('/blog/{slug}', 'Site\BlogController@show')->name('blog.show');

Route::get('/depoimentos', 'Site\DepoimentoController@index')->name('depoimento');
Route::post('/depoimentos', 'Site\DepoimentoController@store')->name('depoimento.store');

Route::get('/contato', 'Site\ContatoController@index')->name('contato');

Auth::routes();