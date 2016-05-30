<?php

Route::get('/paradas/{origem}', [
    'uses' => 'RotaController@getParadas',
    'as'   => 'parada',
]);

<<<<<<< Updated upstream
Route::get('/paradas', 'RotaController@showTodasParadas');
=======
Route::get('/', function () {
    return view('welcome');
})->name('home');
>>>>>>> Stashed changes

Route::get('/rotas/{id}',
['uses' => 'RotaController@showParadasDaRota']);

Route::get('/rotas/',
['uses' => 'RotaController@showTodasRotas']);

Route::get('/rotasAPI/{id}', //este id eh o id do ponto destino, nao eh o id da rota. Essa funcao retorna todas as rotas nas quais esse ponto faz parte
['uses' => 'RotaController@getRotasParaDestino']);
<<<<<<< HEAD

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);

Route::get('/admin', [
    'uses' => 'CardapioController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::get('/criar-cardapio', [
    'uses' => 'CardapioController@getCriarCardapio',
    'as' => 'criar-cardapio',
    'middleware' => 'auth'
]);

Route::get('/cardapio', [
    'uses' => 'CardapioController@getCardapio',
    'as' => 'cardapio',
    'middleware' => 'auth'
]);

Route::get('/historico-cardapios', [
    'uses' => 'CardapioController@getHistorico',
    'as' => 'historico',
    'middleware' => 'auth'
]);
<<<<<<< Updated upstream
=======
>>>>>>> 4abfdb562048aa41ae35d8fb0e4266e69acbe954
=======

>>>>>>> Stashed changes
