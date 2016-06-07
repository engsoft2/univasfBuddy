<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/paradas', 'RotaController@showTodasParadas');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/rotas/{id}',
['uses' => 'RotaController@showParadasDaRota']);

Route::get('/rotas',
['uses' => 'RotaController@showTodasRotas']);

Route::get('/rotasAPI/{id}', //este id eh o id do ponto destino, nao eh o id da rota. Essa funcao retorna todas as rotas nas quais esse ponto faz parte
['uses' => 'RotaController@getRotasParaDestino']);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as'   => 'signin',
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as'   => 'logout',
]);

Route::get('/inicio', [
    'uses'       => 'CardapioController@inicio',
    'as'         => 'inicio'/*,
    'middleware' => 'auth',*/
]);

Route::get('/criar-cardapio', [
    'uses'       => 'CardapioController@criarCardapio',
    'as'         => 'criar-cardapio'/*,
    'middleware' => 'auth',*/
]);

Route::post('/salvar-cardapio', [
    'uses'       => 'CardapioController@store',
    'as'         => 'salvar-cardapio'/*,
    'middleware' => 'auth',*/
]);

Route::get('/editar-cardapio', [
    'uses'       => 'CardapioController@editarCardapio',
    'as'         => 'editar-cardapio'/*,
    'middleware' => 'auth',*/
]);

Route::get('/cardapio/{date?}', [
    'uses'       => 'CardapioController@cardapio',
    'as'         => 'cardapio'/*,
    'middleware' => 'auth',*/
]);

Route::get('/historico-cardapios', [
    'uses'       => 'CardapioController@historico',
    'as'         => 'historico'/*,
    'middleware' => 'auth',*/
]);

Route::get('/cardapio/{startDate}/{endDate}',
['uses' => 'CardapioController@getCardapios'])->where(['startDate' => '[0-9]{2}-[0-9]{2}-[0-9]{4}', 'endDate' => '[0-9]{2}-[0-9]{2}-[0-9]{4}']);
