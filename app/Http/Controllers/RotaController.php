<?php

namespace App\Http\Controllers;

use App\Ponto;
use App\Rota;

class RotaController extends Controller
{
    private static function _insertUniqueRoute($array, $route){
        /*input: Array of routes and route
        returns: List updated;
        */
        $duplicated = false;
            foreach ($array as $item) {
                if ($item['id'] == $route['id']) {
                    $duplicated = true;
                    break;
                }
            }
            if ($duplicated == false) {
                array_push($array, $route);
            }
         return $array;
    }
    
    private static function _isOriginOfRoute($stopsOfRoute,$id)
    {
        /*input: $All stops from Route and $id of stop
        returns: Boolean if it is only the origin of route;
        */
        $count = 0;
        foreach ($stopsOfRoute as $stop) {
            if ($stop['id'] == $id) 
            {
                $count = $count + 1;
            }
        }
        if ($count == 1 and $stopsOfRoute[0]['id'] == $id) 
        {
            return TRUE;
        }
        return FALSE;
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
              'rota_id' => $ponto->pivot->rota_id,
              'id'      => $ponto->id,
              'name'    => $ponto->name,
              'lat'     => $ponto->lat,
              'lng'     => $ponto->lng,
              'time'    => $ponto->pivot->horario, ];

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
              'stops' => $this->showParadasDaRota($rota->id),
            ];

            array_push($retorno, $r);
        }

        return $retorno;
    }


    public function getRotasParaDestino($id) 
    {
        /*input: Needs id from the stop that user wants to get to
        return: All routes which the point belongs to and is not the origin of the route */
        
        $ponto = Ponto::find($id);
        $rotasValidas = $ponto->rotas;
        $retorno = [];

        foreach ($rotasValidas as $rota) {
            $pontos = [];
            $pontosRota = $rota->pontos->all();

            foreach ($pontosRota as $pt) {
                $p = [
                  'id'    => $pt->id,
                  'name'  => $pt->name,
                  'lat'   => $pt->lat,
                  'lng'   => $pt->lng,
                  'time'  => $pt->pivot->horario, ];
                array_push($pontos, $p);
            }
            if(RotaController::_isOriginOfRoute($pontos,$id)==TRUE)
            {
                continue; //The point is the origin of the route, and route does not return to this point. So it's impossible to this point to be a destination.
            }
            
            $r = [
                'id'      => $rota->id,
                'bus'     => $rota->onibus,
                'driver'  => $rota->motorista,
                'way'     => $rota->via,
                'stops'   => $pontos, ];
                
            $retorno = RotaController::_insertUniqueRoute($retorno,$r); //Inserts route only if is not in the list already
            
        }

        return $retorno;
    }
    
    
}
