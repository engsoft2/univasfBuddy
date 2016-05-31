<?php

namespace App\Http\Controllers;

use App\ Ponto;
use App\Rota;
use Illuminate\Http\Request;

class ret
{
    public $rota = '';
    public $ponto_inicial = '';
    public $ponto_final = '';
}
class parada
{
    public $nome = '';
    public $horario = '';
}

class RotaParada
{
    public $rota_id = '';
    public $rota_nome = '';
}

class RotaController extends Controller
{
    public function getParadas(Request $request)
    {
        $pontos = Ponto::where('nome', '=', $request->origem)->get();
        echo '<h2>Origem: '.$request->origem.'</h2>';
        echo 'HORÁRIO'.' - '.'ÔNIBUS'.' - '.'MOTORISTA'.'<br>';
        foreach ($pontos as $ponto) {
            foreach ($ponto->rotas as $rota) {
                // pivot attribute exists on related subject
                echo $rota->pivot->horario.' - '.$rota->onibus.' - '.$rota->motorista.'<br>';
            }
        }
    }

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
                'rota_id'  => $ponto->pivot->rota_id,
                'ponto_id' => $ponto->id,
            'nome_parada'  => $ponto->nome,
            'lat'          => $ponto->lat,
            'lng'          => $ponto->lng,
            'horario'      => $ponto->pivot->horario, ];
            array_push($retorno, $p);
        }

        return $retorno; //json_encode(array('parada' => $retorno));
    }

    public function showTodasRotas()
    {
        $retornoArray = [];

        $rotas = Rota::all();
        foreach ($rotas as $rota) {
            $ret = new ret();
            $ret->ponto_inicial = new parada();
            $ret->ponto_final = new parada();
            $ret->rota = $rota->id;
            $ret->onibus = $rota->onibus;
            $ret->via = $rota->via;
            $ret->ponto_inicial->nome = $rota->pontos->first()->nome;
            $ret->ponto_inicial->horario = $rota->pontos->first()->pivot->horario;
            $ret->ponto_final->nome = $rota->pontos->last()->nome;
            $ret->ponto_final->horario = $rota->pontos->last()->pivot->horario;

            $ret->paradas = $this->showParadasDaRota($rota->id);
            array_push($retornoArray, $ret);
        }

        return $retornoArray;
    }

/*
    public function getRotasParaDestino($id)
    {
        //$rotasValidas = Rota::all();
        $ponto = Ponto::find($id);
        $rotasValidas = $ponto->rotas;
        $retorno = [];

        foreach ($rotasValidas as $rota) {
            $pontos = [];
            //echo $rota;
            $pontosRota = $rota->pontos->all();

            //echo $pontosRota[0];
            foreach ($pontosRota as $pt) {
                $p = ['ponto_id'            => $pt->id,
                            'ponto_nome'    => $pt->nome,
                            'ponto_horario' => $pt->pivot->horario, ];
                array_push($pontos, $p);
            }
            $r = ['rota_id'              => $rota->id,
                        'rota_onibus'    => $rota->onibus,
                        'rota_motorista' => $rota->motorista,
                        'rota_via'       => $rota->via,
                        'pontos'         => $pontos, ];
            array_push($retorno, $r);
        }

        return $retorno;
    }
    */
/*
    public function showParadasDaRota($id)
    {
        $rota = Rota::find($id);

        $retorno = array();
        foreach($rota->pontos as $ponto)
        {
            $p = array('rota_id' => $ponto->pivot->rota_id,
            'nome_parada' => $ponto->nome,
            'horario' => $ponto->pivot->horario);
            array_push($retorno,$p);
        }
        return json_encode(array('parada' => $retorno));
    }
    */
    /*
    public function showTodasRotas()
    {

        $retornoArray = array();

        $rotas = Rota::all();
        foreach($rotas as $rota)
        {
            $ret = new ret();
            $ret->ponto_inicial = new parada();
            $ret->ponto_final = new parada();
            $ret->rota = $rota->id;
            $ret->ponto_inicial->nome = $rota->pontos->first()->nome;
            $ret->ponto_inicial->horario = $rota->pontos->first()->pivot->horario;
            $ret->ponto_final->nome = $rota->pontos->last()->nome;
            $ret->ponto_final->horario = $rota->pontos->last()->pivot->horario;
            array_push($retornoArray,$ret);
        }
        return $retornoArray;
    }
    */
    public function getRotasParaDestino($id)
    {
        //$rotasValidas = Rota::all();
        $ponto = Ponto::find($id);
        $rotasValidas = $ponto->rotas;
        $retorno = [];

        foreach ($rotasValidas as $rota) {
            $pontos = [];
            //echo $rota;
            $pontosRota = $rota->pontos->all();

            //echo $pontosRota[0];
            foreach ($pontosRota as $pt) {
                $p = ['ponto_id'            => $pt->id,
                            'ponto_nome'    => $pt->nome,
                            'ponto_horario' => $pt->pivot->horario, ];
                array_push($pontos, $p);
            }
            $count = 0;
            foreach ($pontos as $ponto) {
                if ($ponto['ponto_id'] == $id) {
                    $count = $count + 1;
                }
            }
            if ($count == 1 and $pontos[0]['ponto_id'] == $id) {
                continue;
            }
            $r = ['rota_id'              => $rota->id,
                        'rota_onibus'    => $rota->onibus,
                        'rota_motorista' => $rota->motorista,
                        'rota_via'       => $rota->via,
                        'pontos'         => $pontos, ];
            $duplicated = false;
            foreach ($retorno as $item) {
                if ($item['rota_id'] == $rota->id) {
                    $duplicated = true;
                    break;
                }
            }
            if ($duplicated == false) {
                array_push($retorno, $r);
            }
        }

        return $retorno;
    }
}
