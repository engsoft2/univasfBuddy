<?php

namespace App\Http\Controllers;

use App\Ponto;
use App\Rota;

class RotaController extends Controller
{
    public function showTodasParadas()
    {
        return Ponto::all();
    }

    public function showParadasDaRota($id)
    {
        $rota = Rota::find($id);
        $retorno = [];

        foreach ($rota->pontos as $ponto) {
            $p = [
                'rota_id'       => $ponto->pivot->rota_id,
                'id'            => $ponto->id,
            'name'              => $ponto->name,
            'lat'               => $ponto->lat,
            'lng'               => $ponto->lng,
            'time'              => $ponto->pivot->horario, ];
            array_push($retorno, $p);
        }

        return $retorno;
    }

    public function showTodasRotas()
    {
        $rotas = Rota::all();
        $retorno = [];

        foreach ($rotas as $rota) {
            $r = [
              'id'    => $rota->id,
              'bus'   => $rota->onibus,
              'way'   => $rota->via,
              'stops' => $this->showParadasDaRota($rota->id)
            ];

            array_push($retorno, $r);
        }

        return $retorno;
    }

    public function getRotasParaDestino($id)
    {
        $ponto = Ponto::find($id);
        $rotasValidas = $ponto->rotas;
        $retorno = [];

        foreach ($rotasValidas as $rota) {
            $pontos = [];
            $pontosRota = $rota->pontos->all();

            foreach ($pontosRota as $pt) {
                $p = ['id'        => $pt->id,
                  'name'          => $pt->nome,
                  'time'          => $pt->pivot->horario, ];

                array_push($pontos, $p);
            }

            $r = ['id'             => $rota->id,
                'bus'              => $rota->onibus,
                'driver'           => $rota->motorista,
                'way'              => $rota->via,
                'stops'            => $pontos, ];

            array_push($retorno, $r);
        }

        return $retorno;
    }
}
