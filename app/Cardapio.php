<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    //
    public static function parseLunch($lunchArray, $startDate,$type){
      $return =
          ['date'                                             => date_format($startDate,'Y-m-d'),
          'type'                                              => $type,
          'sld_crua'                                          => $lunchArray[0],
          'sld_cozida'                                        => $lunchArray[1],
          'prt_principal'                                     => $lunchArray[2],
          'guarnicao'                                         => $lunchArray[3],
          'cereal'                                            => $lunchArray[4],
          'leguminosa'                                        => $lunchArray[5],
          'vegetariano'                                       => $lunchArray[6],
          'sobremesa'                                         => $lunchArray[7],
          'bebida'                                            => $lunchArray[8]];
      return $return;
    }
    public static function parseDinner($dinnerArray, $startDate,$type){
      $return =
          ['date'                                             => date_format($startDate,'Y-m-d'),
          'type'                                              => $type,
          'sld_crua'                                          => $dinnerArray[0],
          'prt_principal'                                     => $dinnerArray[1],
          'guarnicao'                                         => $dinnerArray[2],
          'cereal'                                            => $dinnerArray[3],
          'leguminosa'                                        => $dinnerArray[4],
          'sopa'                                              => $dinnerArray[5],
          'bebida'                                            => $dinnerArray[6]];
      return $return;
    }
}
