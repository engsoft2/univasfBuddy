<?php

namespace App\Http\Controllers;

use App\Cardapio;
use DateTime;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function getCardapios($dt_start, $dt_end)
    {
        $dt_start = new DateTime($dt_start);
        $dt_end = new DateTime($dt_end);
        $cardapios = Cardapio::whereDate('date', '>=', $dt_start->format('Y-m-d'))->whereDate('date', '<=', $dt_end->format('Y-m-d'));
        print_r($cardapios);
    }

    public function store(Request $request)
    {
        Cardapio::firstOrCreate(['date'         => $request->date,
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
    }

    public function update(Request $request, $id)
    {
        Cardapio::where('id', $id)->update([
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
    }
}
