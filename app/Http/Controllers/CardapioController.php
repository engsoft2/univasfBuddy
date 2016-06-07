<?php

namespace App\Http\Controllers;

use App\Cardapio;
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

    public function cardapio(Request $request)
    {
        // recebe datas startDate e endDate
        // retorna para a view junto das datas
        // return view('layouts.cardapio', ... );
        echo 'startDate: ' . $request->start . ' - endDate: ' . $request->end;
    }

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
        return view('layouts.cardapio');
    }

    public function salvarCardapio(Request $request)
    {
        //recebe lunch, dinner, startDate, endDate
        //salva no banco
        return response()->json(['start' => $request->startDate, 'end' => $request->endDate, 'lunch' => $request->lunch, 'dinner' => $request->dinner]); 
    }

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
}
