<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rota extends Model
{
    public function pontos()
    {
        return $this->belongsToMany('App\Ponto', 'rota_ponto', 'rota_id', 'ponto_id')->withPivot('horario');
    }
}
