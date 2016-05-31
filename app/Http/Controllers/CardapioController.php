<?php

namespace App\Http\Controllers;

use \DateTime;
use App\Cardapio;
use Illuminate\Http\Request;

use App\Http\Requests;

class CardapioController extends Controller
{
    public function getCardapios($dt_start,$dt_end)
    {
        $dt_start = new DateTime($dt_start);
        $dt_end = new DateTime($dt_end);
        $cardapios = Cardapio::whereDate('date','>=',$dt_start->format('Y-m-d'))->whereDate('date','<=',$dt_end->format('Y-m-d'));
        print_r($cardapios);            
    }
}
