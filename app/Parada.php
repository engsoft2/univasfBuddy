<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    public function rotas()
    {
        return $this->belongsTo('App\Rota');
    }
}
