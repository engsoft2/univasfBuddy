<?php

namespace App\Http\Controllers;

use App\Cardapio;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    // deslocar essa função para o controller da tabela Cardápio
    public function historico(Request $request)
    {
        //retorna todas as datas para o layout
      $datas = [['dataInicio'  => '20/05/16',
      'dataFim'                => '27/05/16',
      'id'                     => '1', ],
      ['dataInicio'            => '30/05/16',
      'dataFim'                => '06/06/16',
      'id'                     => '2', ], ];

        return view('layouts.historico-cardapios', ['datas' => $datas]);
    }

    public function index(Request $request)
    {
        $cardapios = Cardapio::all();

        return $cardapios;
    }

    //funcao update
    public function editarCardapio()
    {
        return view('layouts.editar-cardapio');
    }

    public function criarCardapio()
    {
        return view('layouts.criar-cardapio');
    }

    public function inicio()
    {
        //procura último cardápio e sua data de início e fim
        //e para o layout
        //return view('layouts.cardapio', ... );
        $lastMeal = Cardapio::max('date');
        //print_r($lastMeal);
        $lastMeals = Cardapio::where('date', '<=', $lastMeal);
        $firstDate = date($lastMeal, strtotime('-5 days'));
        $lastMeals = $lastMeals->where('date', '=>', $firstDate);
        //return ($lastMeal);
        return view('layouts.cardapio', ['cardapios' => $lastMeals]);
    }

    /* Função Store */
    public function salvarCardapio(Request $request)
    {
        //recebe lunch, dinner, startDate, endDate
        //salva no banco
        return response()->json(['start' => $request->startDate, 'end' => $request->endDate, 'lunch' => $request->lunch, 'dinner' => $request->dinner]);
    }

    public function getCardapios($startDate, $endDate)
    {
        $startDate = DateTime::createFromFormat('d-m-Y', $startDate);
        $endDate = DateTime::createFromFormat('d-m-Y', $endDate);
        $cardapios = Cardapio::where('date', '>=', $startDate)->where('date', '<=', $endDate)->get();
        //print_r($cardapios);
        return $cardapios;
    }

    public function store(Request $request)
    {
        $lunchs = [];
        $dinners = [];
        $startDate = DateTime::createFromFormat('d/m/Y', $request->startDate);
        $endDate = DateTime::createFromFormat('d/m/Y', $request->endDate);
        //echo("<script>console.log('PHP: ".json_encode($startDate)."');</script>");
        $currentDate = $startDate;
        foreach ($request->lunch as $meal) {
            array_push($lunchs, Cardapio::parseLunch($meal, $currentDate, 0)); //tipo 0: almoço
          $currentDate = $currentDate->add(new DateInterval('P1D'));
        }
        $currentDate = DateTime::createFromFormat('d/m/Y', $request->startDate);
        foreach ($request->dinner as $meal) {
            array_push($dinners, Cardapio::parseDinner($meal, $currentDate, 1)); //tipo 1: jantar
          $currentDate = $currentDate->add(new DateInterval('P1D'));
        }
        $cardapio = Cardapio::insert($lunchs);
        $cardapio = Cardapio::insert($dinners);
        /*
        $cardapio = Cardapio::firstOrCreate(['date'         => $request->date,
            'type'                                              => $request->type,
            'sld_crua'                                          => $request->sld_crua,
            'sld_cozida'                                        => $request->sld_cozida,
            'prt_principal'                                     => $request->prt_principal,
            'guarnicao'                                         => $request->guarnicao,
            'cereal'                                            => $request->cereal,
            'leguminosa'                                        => $request->leguminosa,
            'vegetariano'                                       => $request->vegetariano,
            'sobremesa'                                         => $request->sobremesa,
            'sopa'                                              => $request->sopa,
            'bebida'                                            => $request->bebida, ]
          );
          */
          //print_r($cardapio);
          return response()->json($cardapio);
    }

    public function update(Request $request, $id, $type, $date)
    {
        $meal = [];
        if ($type == 0) {
            $meal = Cardapio::parseLunch($request->lunch, $date, $type);
        } elseif ($type == 1) {
            $meal = Cardapio::parseDinner($request->dinner, $date, $type);
        }
        $cardapio = Cardapio::where('date', $date)->where('type', $type)->update($meal);

        return $cardapio;
    }
}
