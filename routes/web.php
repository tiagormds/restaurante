<?php


Route::group(['prefix'=>'/produtos'], function(){
    Route::get('/', ['as'=>'produtos.index', 'uses'=>'ProdutosController@index']);
    Route::get('/show/{id}', ['as'=>'produtos.show', 'uses'=>'ProdutosController@show']);
    Route::get('/create', ['as'=>'produtos.create', 'uses'=>'ProdutosController@create']);
    Route::post('/store', ['as'=>'produtos.store', 'uses'=>'ProdutosController@store']);
    Route::get('/edit/{id}', ['as'=>'produtos.edit', 'uses'=>'ProdutosController@edit']);
    Route::put('/update/{id}', ['as'=>'produtos.update', 'uses'=>'ProdutosController@update']);
    Route::put('/destroy/{id}', ['as'=>'produtos.destroy', 'uses'=>'ProdutosController@destroy']);
    Route::post('/buscar', ['as'=>'produtos.buscar', 'uses'=>'ProdutosController@buscar']);
});
