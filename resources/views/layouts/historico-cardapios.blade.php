@extends('layouts.master')

@include('includes.header')
@include('includes.modal-refeicao')

@section('title')
    Admin
@endsection

@section('content')
  <h2>Cardápios Anteriores</h2>
  <div class="container"> 
    <!-- criar uma tabela para almoço e para janta -->
    <!-- lembrar de mudar para acessar collections-->
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Início</th>
                  <th>Fim</th>
                  <th>Ver</th>
              </tr>
          </thead>
          @foreach($datas as $cardapio)
          <tbody>
            <tr>
              <td>{{$cardapio['dataInicio']}}</td>
              <td>{{$cardapio['dataFim']}}</td>
              <td><a href="{{ route('cardapio') }}">Ver</a></td>
            </tr>
          </tbody>
                  
          @endforeach 
      </table>  
    </div>     
  </div>    

@endsection