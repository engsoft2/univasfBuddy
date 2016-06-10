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
      $datas = [[
          'dataInicio'             => '13/06/2016',
          'dataFim'                => '17/06/2016'],
          ['dataInicio'            => '27/06/2016',
          'dataFim'                => '01/07/2016']];

      return view('layouts.historico-cardapios', ['datas' => $datas]);
    }

    public function index(Request $request)
    {
        $cardapios = Cardapio::all();

        return $cardapios;
    }

    //funcao update
    public function editarCardapio(Request $request)
    {
        return view('layouts.editar-cardapio', ['firstDate' => $request->firstDate, 'lastDate' => $request->lastDate, 'cardapios' => $request->cardapios]);
    }

    public function criarCardapio()
    {
        return view('layouts.criar-cardapio');
    }

    public function inicio()
    {

        $lastDate = Cardapio::max('date');
        $firstDate = null;
        $lunch = null;
        $dinner = null;

        if(!is_null($lastDate)){
            $firstDate = date('Y-m-d', strtotime('-4 days', strtotime($lastDate)));
            $lunch = Cardapio::whereBetween('date', [$firstDate, $lastDate])->where('type', '=', 0)->get();
            $dinner = Cardapio::whereBetween('date', [$firstDate, $lastDate])->where('type', '=', 1)->get();

            $firstDate = date('d-m-Y', strtotime($firstDate));
            $lastDate = date('d-m-Y', strtotime($lastDate));
        }

        return view('layouts.cardapio', ['firstDate' => $firstDate, 'lastDate' => $lastDate, 'lunch' => $lunch, 'dinner' => $dinner]);
    }

    /* Função Store */
    public function salvarCardapio(Request $request)
    {
        //recebe lunch, dinner, startDate, endDate
        //salva no banco
        return response()->json(['start' => $request->startDate, 'end' => $request->endDate, 'lunch' => $request->lunch, 'dinner' => $request->dinner]);
    }

    public function getCardapios(Request $request)
    {

        $firstDate = date('d-m-Y', strtotime($request->firstDate));
        $lastDate = date('d-m-Y', strtotime($request->lastDate));

        $firstDate_DB = date('Y-m-d', strtotime($request->firstDate));
        $lastDate_DB= date('Y-m-d', strtotime($request->lastDate));

        $lunch = Cardapio::whereBetween('date', [$firstDate_DB, $lastDate_DB])->where('type', '=', 0)->get();
        $dinner = Cardapio::whereBetween('date', [$firstDate_DB, $lastDate_DB])->where('type', '=', 1)->get();
       
        return view('layouts.cardapio', ['firstDate' => $firstDate, 'lastDate' => $lastDate, 'lunch' => $lunch, 'dinner' => $dinner]);
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
