<?php

Route::get('/login/index', ['as'=>'login', 'uses'=>'LoginController@index']);
Route::post('/login', ['as'=>'login.auth', 'uses'=>'LoginController@login']);
Route::get('/logout', ['as'=>'login.logout', 'uses'=>'LoginController@logout']);

Route::group(['prefix'=>'/produtos', 'middleware'=>'auth'], function(){
    Route::get('/', ['as'=>'produtos.index', 'uses'=>'ProdutosController@index']);
    Route::get('/show/{id}', ['as'=>'produtos.show', 'uses'=>'ProdutosController@show']);
    Route::get('/create', ['as'=>'produtos.create', 'uses'=>'ProdutosController@create']);
    Route::post('/store', ['as'=>'produtos.store', 'uses'=>'ProdutosController@store']);
    Route::get('/edit/{id}', ['as'=>'produtos.edit', 'uses'=>'ProdutosController@edit']);
    Route::put('/update/{id}', ['as'=>'produtos.update', 'uses'=>'ProdutosController@update']);
    Route::put('/destroy/{id}', ['as'=>'produtos.destroy', 'uses'=>'ProdutosController@destroy']);
    Route::post('/buscar', ['as'=>'produtos.buscar', 'uses'=>'ProdutosController@buscar']);
});
