<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rota;
use App\ Ponto;

class RotaController extends Controller
{
    public function getParadas(Request $request){
    	$pontos = Ponto::where('nome', '=', $request->origem)->first();
    	echo "<h2>Origem: " . $request->origem . "</h2>";
    	echo "HORÁRIO" . " - " . "ÔNIBUS" . " - " . "MOTORISTA" . "<br>";
    	foreach($pontos->rotas as $rota) {
		    // pivot attribute exists on related subject
		    echo $rota->pivot->horario . " - " . $rota->onibus . " - " . $rota->motorista . "<br>";
		}
		    	
    }
}
