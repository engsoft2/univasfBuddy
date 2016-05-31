<?php

namespace App\Http\Controllers;

use App\ Ponto;
use App\Rota;
use Illuminate\Http\Request;

class ret
{
	public $id = "";
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

		foreach($rota->pontos as $ponto) {
			$p = array(
				'rota_id'	=> $ponto->pivot->rota_id,
				'id' 			=> $ponto->id,
    		'name' 		=> $ponto->name,
    		'lat' 		=> $ponto->lat,
    		'lng' 		=> $ponto->lng,
    		'time' 		=> $ponto->pivot->horario);
			array_push($retorno, $p);
		}

		return $retorno;
	}

	public function showTodasRotas()
	{
		$rotas = Rota::all();
		$retorno = [];

		foreach($rotas as $rota)
		{
			$ret = new ret();
			$ret->id = $rota->id;
			$ret->bus = $rota->onibus;
			$ret->way = $rota->via;

			$ret->stops = $this->showParadasDaRota($rota->id);
			array_push($retorno, $ret);
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
            $p = ['id'		=> $pt->id,
                  'name'	=> $pt->nome,
                  'time' 	=> $pt->pivot->horario];

            array_push($pontos, $p);
          }

          $r = ['id'			=> $rota->id,
                'bus'			=> $rota->onibus,
                'driver'	=> $rota->motorista,
                'way'			=> $rota->via,
                'stops'		=> $pontos];

          array_push($retorno, $r);
      }

      return $retorno;
  }
}
