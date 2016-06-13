@extends('layouts.master')

@include('includes.header')
@include('includes.modal-refeicao')

@section('title')
    Admin
@endsection

@section('content')
  <div class="container-fluid">
    <h2>Cardápios Anteriores</h2>
    <div class="historico-container">
      @if(empty($datas))
        <p>Histórico vazio. Não há cardápios anteriores.</p>
      @else
        <div id="jsGrid"></div>
      @endif
    </div>
  </div>       
  
  @section('scripts')
    @if(!empty($datas))
      var clients = [
        @foreach($datas as $cardapio)
          { "Data de Início": "{{$cardapio['dataInicio']}}", "Data de Término": "{{$cardapio['dataFim']}}" },                  
        @endforeach 
      ];

      jsGrid.locale("pt-br");

      $("#jsGrid").jsGrid({
          width: "100%",
   
          //filtering: true,
          sorting: true,
          paging: true,
          autoload: true,
   
          pageSize: 15,
          pageButtonCount: 5,

          data: clients,

          rowClick: function(args) {
            var firstDate = args.item["Data de Início"].replace(/\//gi, '-');
            var lastDate = args.item["Data de Término"].replace(/\//gi, '-');
            console.log(args.item, firstDate, lastDate);
            window.location.href = "{{ route('cardapio') }}" + "/" + firstDate + "/" + lastDate;
          },  

          fields: [
              { name: "Data de Início", type: "date"},
              { name: "Data de Término", type: "date"}
          ]
      });
    @endif


     

  @stop

@endsection