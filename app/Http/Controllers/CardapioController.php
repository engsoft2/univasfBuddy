<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CardapioController extends Controller
{
    	// deslocar essa função para o controller da tabela Cardápio
public function getHistorico(Request $request)
    {
    	//recebe request->data, procura no banco e retorna 1 cardápio
	    	$datas = [[ 'dataInicio'  => '20/05/16',
		    			'dataFim'     => '27/05/16',
		    		    'id'          => '1' ],
		    		  [ 'dataInicio'  => '30/05/16',
	    			 	'dataFim'     => '06/06/16',
	    		     	'id'          => '2' ]];	    				    				   ;

    	return view('layouts.historico-cardapios', ['datas' => $datas]);
    }

    public function getDashboard()
    {
    	//último cardápio
    	$data = [
	    			'dataInicio'  => '20/05/16',
	    			'dataFim'     => '27/05/16',
	    			'cardapio'    => [
		    							['tipo'    => 'Almoço',
		    							'refeicao' => [[
	    				        	    	    		'dia' => 'Segunda-feira',
	    				        	    	    		'acompanhamento' => [
	    				        	    	    			'Arroz integral',
	    				        	    	    			'Lentilha'
	    				        	    	    		],
	    				        	    	    		'prato_principal' => 'Bife acebolado',
	    				        	    	    		'complemento' => 'Cenoura e chuchu',
	    				        	    	    		'salada' => 'Agrião e tomate',
	    				        	    	    		'sobremesa' => 'Abacaxi'
		    				    	    	    	     ],
		    				    	
		    				        	    	    	[
		    				        			    		'dia' => 'Terça-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	],
		    				        			    	[
		    				        	    	    		'dia' => 'Quarta-feira',
		    				        	    	    		'acompanhamento' => [
		    				        	    	    			'Arroz integral',
		    				        	    	    			'Lentilha'
		    				        	    	    		],
		    				        	    	    		'prato_principal' => 'Bife acebolado',
		    				        	    	    		'complemento' => 'Cenoura e chuchu',
		    				        	    	    		'salada' => 'Agrião e tomate',
		    				        	    	    		'sobremesa' => 'Abacaxi'
		    				        	    	    	],
		    				        	    	    	[
		    				        			    		'dia' => 'Quinta-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	],
		    				        			    	[
		    				        			    		'dia' => 'Sexta-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	]
		    				    	
		    				    	    	]], 
	    				    	    	['tipo'    => 'Janta',
		    							'refeicao' => [[
	    				        	    	    		'dia' => 'Segunda-feira',
	    				        	    	    		'acompanhamento' => [
	    				        	    	    			'Arroz integral',
	    				        	    	    			'Lentilha'
	    				        	    	    		],
	    				        	    	    		'prato_principal' => 'Bife acebolado',
	    				        	    	    		'complemento' => 'Cenoura e chuchu',
	    				        	    	    		'salada' => 'Agrião e tomate',
	    				        	    	    		'sobremesa' => 'Abacaxi'
		    				    	    	    	     ],
		    				    	
		    				        	    	    	[
		    				        			    		'dia' => 'Terça-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	],
		    				        			    	[
		    				        	    	    		'dia' => 'Quarta-feira',
		    				        	    	    		'acompanhamento' => [
		    				        	    	    			'Arroz integral',
		    				        	    	    			'Lentilha'
		    				        	    	    		],
		    				        	    	    		'prato_principal' => 'Bife acebolado',
		    				        	    	    		'complemento' => 'Cenoura e chuchu',
		    				        	    	    		'salada' => 'Agrião e tomate',
		    				        	    	    		'sobremesa' => 'Abacaxi'
		    				        	    	    	],
		    				        	    	    	[
		    				        			    		'dia' => 'Quinta-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	],
		    				        			    	[
		    				        			    		'dia' => 'Sexta-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	]
		    				    	
		    				    	    	]]]];

    	return view('layouts.cardapio', ['data' => $data]);

    }

	public function getCardapio(Request $request)
    {
    	//recebe request->data, procura no banco e retorna 1 cardápio
	    	$data = [
	    			'dataInicio'  => '20/05/16',
	    			'dataFim'     => '27/05/16',
	    			'cardapio'    => [
		    							['tipo'    => 'Almoço',
		    							'refeicao' => [[
	    				        	    	    		'dia' => 'Segunda-feira',
	    				        	    	    		'acompanhamento' => [
	    				        	    	    			'Arroz integral',
	    				        	    	    			'Lentilha'
	    				        	    	    		],
	    				        	    	    		'prato_principal' => 'Bife acebolado',
	    				        	    	    		'complemento' => 'Cenoura e chuchu',
	    				        	    	    		'salada' => 'Agrião e tomate',
	    				        	    	    		'sobremesa' => 'Abacaxi'
		    				    	    	    	     ],
		    				    	
		    				        	    	    	[
		    				        			    		'dia' => 'Terça-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	],
		    				        			    	[
		    				        	    	    		'dia' => 'Quarta-feira',
		    				        	    	    		'acompanhamento' => [
		    				        	    	    			'Arroz integral',
		    				        	    	    			'Lentilha'
		    				        	    	    		],
		    				        	    	    		'prato_principal' => 'Bife acebolado',
		    				        	    	    		'complemento' => 'Cenoura e chuchu',
		    				        	    	    		'salada' => 'Agrião e tomate',
		    				        	    	    		'sobremesa' => 'Abacaxi'
		    				        	    	    	],
		    				        	    	    	[
		    				        			    		'dia' => 'Quinta-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	],
		    				        			    	[
		    				        			    		'dia' => 'Sexta-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	]
		    				    	
		    				    	    	]], 
	    				    	    	['tipo'    => 'Janta',
		    							'refeicao' => [[
	    				        	    	    		'dia' => 'Segunda-feira',
	    				        	    	    		'acompanhamento' => [
	    				        	    	    			'Arroz integral',
	    				        	    	    			'Lentilha'
	    				        	    	    		],
	    				        	    	    		'prato_principal' => 'Bife acebolado',
	    				        	    	    		'complemento' => 'Cenoura e chuchu',
	    				        	    	    		'salada' => 'Agrião e tomate',
	    				        	    	    		'sobremesa' => 'Abacaxi'
		    				    	    	    	     ],
		    				    	
		    				        	    	    	[
		    				        			    		'dia' => 'Terça-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	],
		    				        			    	[
		    				        	    	    		'dia' => 'Quarta-feira',
		    				        	    	    		'acompanhamento' => [
		    				        	    	    			'Arroz integral',
		    				        	    	    			'Lentilha'
		    				        	    	    		],
		    				        	    	    		'prato_principal' => 'Bife acebolado',
		    				        	    	    		'complemento' => 'Cenoura e chuchu',
		    				        	    	    		'salada' => 'Agrião e tomate',
		    				        	    	    		'sobremesa' => 'Abacaxi'
		    				        	    	    	],
		    				        	    	    	[
		    				        			    		'dia' => 'Quinta-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	],
		    				        			    	[
		    				        			    		'dia' => 'Sexta-feira',
		    				        			    		'acompanhamento' => [
		    				        			    			'Arroz integral',
		    				        			    			'Lentilha'
		    				        			    		],
		    				        			    		'prato_principal' => 'Bife acebolado',
		    				        			    		'complemento' => 'Cenoura e chuchu',
		    				        			    		'salada' => 'Agrião e tomate',
		    				        			    		'sobremesa' => 'Abacaxi'
		    				        			    	]
		    				    	
		    				    	    	]]]];

    	return view('layouts.cardapio', ['data' => $data]);
    }

    public function getCriarCardapio()
    {
    	return view('layouts.criar-cardapio');
    }
}
