<?php


Route::group(['prefix'=>'/produtos'], function(){
    Route::get('/', ['as'=>'produtos.index', 'uses'=>'ProdutosController@index']);
    Route::get('/show/{id}', ['as'=>'produtos.show', 'uses'=>'ProdutosController@show']);
});
