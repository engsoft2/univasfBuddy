<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rota extends Model
{
    public function paradas()
    {
        return $this->hasMany('App\Parada');
    }
}
