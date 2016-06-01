<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
<<<<<<< HEAD
=======

use App\Cardapio;
>>>>>>> 4abfdb562048aa41ae35d8fb0e4266e69acbe954
=======
use App\Cardapio;
use DateTime;
>>>>>>> master
use Illuminate\Http\Request;

class CardapioController extends Controller
{
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
    //
>>>>>>> 4abfdb562048aa41ae35d8fb0e4266e69acbe954
=======
    public function getCardapios($dt_start, $dt_end)
    {
        $dt_start = new DateTime($dt_start);
        $dt_end = new DateTime($dt_end);
        $cardapios = Cardapio::whereDate('date', '>=', $dt_start->format('Y-m-d'))->whereDate('date', '<=', $dt_end->format('Y-m-d'));
        print_r($cardapios);
    }

    public function store(Request $request)
    {
        $cardapio = Cardapio::firstOrCreate(['date'         => $request->date,
                                'type'                      => $request->type,
                                'sld_crua'                  => $request->sld_crua,
                                'sld_cozida'                => $request->sld_cozida,
                                'prt_principal'             => $request->prt_principal,
                                'guarnicao'                 => $request->guarnicao,
                                'cereal'                    => $request->cereal,
                                'leguminosa'                => $request->leguminosa,
                                'vegetariano'               => $request->vegetariano,
                                'sobremesa'                 => $request->sobremesa,
                                'sopa'                      => $request->sopa,
                                'bebida'                    => $request->bebida, ]
                                );

        return $cardapio;
    }

    public function update(Request $request, $id)
    {
        $cardapio = Cardapio::where('id', $id)->update([
                                'date'          => $request->date,
                                'type'          => $request->type,
                                'sld_crua'      => $request->sld_crua,
                                'sld_cozida'    => $request->sld_cozida,
                                'prt_principal' => $request->prt_principal,
                                'guarnicao'     => $request->guarnicao,
                                'cereal'        => $request->cereal,
                                'leguminosa'    => $request->leguminosa,
                                'vegetariano'   => $request->vegetariano,
                                'sobremesa'     => $request->sobremesa,
                                'sopa'          => $request->sopa,
                                'bebida'        => $request->bebida, ]
                                );

        return $cardapio;
    }
>>>>>>> master
}
