<?php

namespace App\Http\Controllers;


use App\Cardapio;
use Illuminate\Http\Request;

use App\Http\Requests;

class CardapioController extends Controller
{
    public function getCardapios($dt_start,$dt_end)
    {
        return $dt_start;
    }
}
