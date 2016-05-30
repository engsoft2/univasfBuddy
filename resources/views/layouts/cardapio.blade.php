@extends('layouts.master')

@include('includes.modal-refeicao')

@section('title')
    Admin
@endsection

@section('content')
  <h2>Cardápio da Semana - {{$data['dataInicio']}} à {{$data['dataFim']}}</h2>
  <div class="container"> 
    <!-- criar uma tabela para almoço e para janta -->
    <!-- lembrar de mudar para acessar collections-->
    @foreach($data['cardapio'] as $cardapio)
        <h3>{{$cardapio['tipo']}}</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Dia</th>
                        <th colspan="2" scope="colgroup">Acompanhamento</th>
                        <th>Prato Principal</th>
                        <th>Complemento</th>
                        <th>Salada</th>
                        <th>Sobremesa</th>
                    </tr>
                 </thead>
        @foreach($cardapio['refeicao'] as $refeicao)
            <tbody>
                <tr>
                  <th scope="row">{{$refeicao['dia']}}</th>
                  <td>{{$refeicao['acompanhamento'][0]}}</td>
                  <td>{{$refeicao['acompanhamento'][1]}}</td>
                  <td>{{$refeicao['prato_principal']}}</td>
                  <td>{{$refeicao['complemento']}}</td>
                  <td>{{$refeicao['salada']}}</td>
                  <td>{{$refeicao['sobremesa']}}</td>
                </tr>
            </tbody>
        @endforeach  
            </table>  
        </div> 
    @endforeach     
  </div>  

@endsection