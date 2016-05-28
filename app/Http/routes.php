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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/paradas/{origem}', [
    'uses' => 'RotaController@getParadas',
    'as'   => 'parada',
]);

Route::get('/paradas', 'RotaController@showTodasParadas');

Route::get('/rotas/{id}',
['uses' => 'RotaController@showParadasDaRota']);

Route::get('/rotas/',
['uses' => 'RotaController@showTodasRotas']);

Route::get('/rotasAPI/{id}', //este id eh o id do ponto destino, nao eh o id da rota. Essa funcao retorna todas as rotas nas quais esse ponto faz parte
['uses' => 'RotaController@getRotasParaDestino']);
