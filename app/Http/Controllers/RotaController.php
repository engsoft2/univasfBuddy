<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rota;
use App\ Ponto;


class ret
{
	public $id = "";
	// public $ponto_inicial = "";
	// public $ponto_final = "";
}
class parada{
	public $nome = "";
	public $horario = "";
}

class RotaParada{
	public $rota_id = "";
	public $rota_nome = "";
}


class RotaController extends Controller
{
    public function getParadas(Request $request){
    	$pontos = Ponto::where('nome', '=', $request->origem)->get();
    	echo "<h2>Origem: " . $request->origem . "</h2>";
    	echo "HORÁRIO" . " - " . "ÔNIBUS" . " - " . "MOTORISTA" . "<br>";
        foreach($pontos as $ponto) {
        	foreach($ponto->rotas as $rota) {
    		    // pivot attribute exists on related subject
    		    echo $rota->pivot->horario . " - " . $rota->onibus . " - " . $rota->motorista . "<br>";
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

		$retorno = array();
		foreach($rota->pontos as $ponto)
		{
			$p = array(
				'rota_id' => $ponto->pivot->rota_id,
				'id' => $ponto->id,
    		'name' => $ponto->name,
    		'lat' => $ponto->lat,
    		'lng' => $ponto->lng,
    		'time' => $ponto->pivot->horario);
			array_push($retorno,$p);
		}
		return $retorno;//json_encode(array('parada' => $retorno));
	}
	public function showTodasRotas()
	{

		$retornoArray = array();

		$rotas = Rota::all();
		foreach($rotas as $rota)
		{
			$ret = new ret();
			// $ret->ponto_inicial = new parada();
			// $ret->ponto_final = new parada();
			$ret->id = $rota->id;
			$ret->bus = $rota->onibus;
			$ret->way = $rota->via;
			// $ret->ponto_inicial->nome = $rota->pontos->first()->nome;
			// $ret->ponto_inicial->horario = $rota->pontos->first()->pivot->horario;
			// $ret->ponto_final->nome = $rota->pontos->last()->nome;
			// $ret->ponto_final->horario = $rota->pontos->last()->pivot->horario;

			$ret->stops = $this->showParadasDaRota($rota->id);
			array_push($retornoArray,$ret);
		}
		return $retornoArray;
	}

	public function getRotasParaDestino($id) {
		//$rotasValidas = Rota::all();
		$ponto = Ponto::find($id);
		$rotasValidas = $ponto->rotas;
		$retorno = array();

		foreach($rotasValidas as $rota) {
			$pontos = array();
			//echo $rota;
			$pontosRota = $rota->pontos->all();
			//echo $pontosRota[0];
			foreach($pontosRota as $pt) {
				$p = array(
							'id' 			=> $pt->id,
							'name' 		=> $pt->name,
							'time' => $pt->pivot->horario);

				array_push($pontos,$p);
			}
			$count = 0;
			foreach ($pontos as $ponto) {
				if($ponto['id'] == $id) {
					$count += 1;
				}
			}

			if($count == 1 and $pontos[0]['id'] == $id) {
				continue;
			}

			$r = array(
						'id' 				=> $rota->id,
						'bus' 		=> $rota->onibus,
						// 'rota_motorista' 	=> $rota->motorista,
						'way' 				=> $rota->via,
						'stops' 					=> $pontos);

			$dup = false;
			foreach($retorno as $item) {
				if($item['id'] == $rota->id) {
					$dup = true;
					break;
				}
			}
			if (!$dup) {
				array_push($retorno,$r);
			}
		}


		// return array_unique($retorno, SORT_REGULAR);
		return $retorno;
		// return $rotasValidas;
	}
}
