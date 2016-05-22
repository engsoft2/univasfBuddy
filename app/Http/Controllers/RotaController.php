<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rota;
use App\ Ponto;


class ret 
{
	public $rota = "";
	public $ponto_inicial = "";
	public $ponto_final = "";
}
class parada{
	public $nome = "";
	public $horario = "";
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
	public function showParada($id)
	{
		$rota = Rota::find($id);
		
		return $rota->pontos->all();
	}
	public function showParadas()
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
}
