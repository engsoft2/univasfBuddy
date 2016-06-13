<?php

namespace App\Http\Controllers;

use App\Cardapio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    // deslocar essa função para o controller da tabela Cardápio
    public function historico(Request $request)
    {
        //retorna todas as datas para o layout
        $history = [];
        $dates = Cardapio::select('date')->orderBy('date', 'desc')
                ->get();
        // echo($dates->first());
        $numberOfDates = $dates->count();
        // echo($numberOfDates);
        // echo($firstDate);
        for($i = $numberOfDates-1; $i >= 9; $i -= 10)
        {
          // echo($dates[$i]['date']);
          $firstDateCarbon = Carbon::createFromFormat('Y-m-d', $dates[$i-9]['date']);
          $lastDateCarbon = Carbon::createFromFormat('Y-m-d', $dates[$i]['date']);

          array_push($history,['dataInicio'=>$firstDateCarbon->format('d-m-Y'),'dataFim'=>$lastDateCarbon->format('d-m-Y')]);
        }
        //return $history;
        return view('layouts.historico-cardapios', ['datas' => $history]);
        //
        // while(){
        //   $firstDateCarbon = Carbon::createFromFormat('Y-m-d', $firstDate);
        //   print_r($firstDate);
        //   $firstDateCarbon = Carbon::createFromFormat('Y-m-d', $firstDate);
        //   print_r($firstDateCarbon);
        //   $lastDateOfWeek = $firstDateCarbon->copy()->addDays(4);
        //   array_push($dates,['date' => ['firstDate'=>$firstDateCarbon->format('d-m-Y'),'lastDateOfWeek'=>$lastDateOfWeek->format('d-m-Y')]]);


        //}
      //   else{
      //     return $dates;
      //
      //
      //   }null : Carbon::parse(Cardapio::min('date'));
      //   $lastDateOfDb = Carbon::parse(Cardapio::max('date'));
      //
      //   while()
      //   if(empty(Cardapio::min('date')) == true ){
      //      Carbon::parse(Cardapio::min('date'));
      //   }
      //   $firstDate = empty(Cardapio::min('date')) == true ? null : Carbon::parse(Cardapio::min('date'));
      //
      // /*$datas = [[
      //     'dataInicio'             => '13/06/2016',
      //     'dataFim'                => '17/06/2016', ],
      //     ['dataInicio'            => '27/06/2016',
      //     'dataFim'                => '01/07/2016', ], ];*/
      //
      //   return view('layouts.historico-cardapios', ['datas' => $datas]);
    }

    public function index(Request $request)
    {
        $cardapios = Cardapio::all();

        return $cardapios;
    }

    //funcao update
    public function editarCardapio(Request $request)
    {
        $firstDate_DB = date('Y-m-d', strtotime($request->firstDate));
        $lastDate_DB = date('Y-m-d', strtotime($request->lastDate));

        $firstDate = date('d-m-Y', strtotime($request->firstDate));
        $lastDate = date('d-m-Y', strtotime($request->lastDate));

        $lunch = Cardapio::whereBetween('date', [$firstDate_DB, $lastDate_DB])->where('type', '=', 0)->get();
        $dinner = Cardapio::whereBetween('date', [$firstDate_DB, $lastDate_DB])->where('type', '=', 1)->get();

        return view('layouts.editar-cardapio', ['firstDate' => $firstDate, 'lastDate' => $lastDate, 'lunch' => $lunch, 'dinner' => $dinner]);
        // dd($request->lunch);
    }

    public function criarCardapio()
    {
        return view('layouts.criar-cardapio');
    }

    public function inicio()
    {
        $lastDate = empty(Cardapio::max('date')) == true ? null : Carbon::parse(Cardapio::max('date'));

        if (!is_null($lastDate)) {
            $firstDate = $lastDate->copy()->subDays(4);
            $lunch = Cardapio::whereBetween('date', [$firstDate, $lastDate])->where('type', '=', 0)->get();
            $dinner = Cardapio::whereBetween('date', [$firstDate, $lastDate])->where('type', '=', 1)->get();

            return view('layouts.cardapio', ['firstDate' => $firstDate->format('d-m-Y'), 'lastDate' => $lastDate->format('d-m-Y'), 'lunch' => $lunch, 'dinner' => $dinner]);
        }

        return view('layouts.cardapio', ['firstDate' => null, 'lastDate' => null, 'lunch' => null, 'dinner' => null]);
    }

    public function getCardapios(Request $request)
    {
        $startDate = Carbon::parse($request->startDate);
        $endDate = Carbon::parse($request->endDate);

        $lunch = Cardapio::whereBetween('date', [$startDate, $endDate])->where('type', '=', 0)->get();
        $dinner = Cardapio::whereBetween('date', [$startDate, $endDate])->where('type', '=', 1)->get();

        return view('layouts.cardapio', ['firstDate' => $startDate->format('d-m-Y'), 'lastDate' => $endDate->format('d-m-Y'), 'lunch' => $lunch, 'dinner' => $dinner]);
    }

    public function store(Request $request)
    {
        $lunchs = [];
        $dinners = [];

        $startDate = Carbon::createFromFormat('d/m/Y', $request->startDate);
        $currentDate = $startDate->copy();

        foreach ($request->lunch as $meal) {
            array_push($lunchs, Cardapio::parseLunch($meal, $currentDate, 0)); //tipo 0: almoço
            $currentDate = $currentDate->copy()->addDay();
        }

        $currentDate = $startDate->copy();

        foreach ($request->dinner as $meal) {
            array_push($dinners, Cardapio::parseDinner($meal, $currentDate, 1)); //tipo 1: jantar
            $currentDate = $currentDate->copy()->addDay();
        }

        $cardapio = Cardapio::insert($lunchs);
        $cardapio = Cardapio::insert($dinners);

        return $startDate.' / '.$request->startDate;
    }

    public function update(Request $request)
    {
        $startDate = Carbon::parse($request->startDate);
        $currentDate = $startDate->copy();

        foreach ($request->lunch as $meal) {
            $lunch = Cardapio::parseLunch($meal, $currentDate, 0); //tipo 0: almoço
            $cardapio = Cardapio::where('date', '=', $currentDate)->where('type', '=', 0)->update($lunch);
            $currentDate = $currentDate->copy()->addDay();
        }

        $currentDate = $startDate->copy();

        foreach ($request->dinner as $meal) {
            $dinner = Cardapio::parseDinner($meal, $currentDate, 1); //tipo 1: jantar
            $cardapio = Cardapio::where('date', '=', $currentDate)->where('type', '=', 1)->update($dinner);
            $currentDate = $currentDate->copy()->addDay();
        }
    }
}
