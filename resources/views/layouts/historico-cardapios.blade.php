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
      <div id="jsGrid"></div>
    </div>
  </div>       
  
  @section('scripts')
    var clients = [
      @foreach($datas as $cardapio)
        { "Data de Início": "{{$cardapio['dataInicio']}}", "Data de Término": "{{$cardapio['dataFim']}}" },                  
      @endforeach 
    ];

    $(function() {
      jsGrid.locale("pt-br");

      $("#jsGrid").jsGrid({
          width: "100%",
   
          //filtering: true,
          sorting: true,
          paging: true,
          autoload: true,
   
          pageSize: 15,
          pageButtonCount: 5,
   
          deleteConfirm: "Do you really want to delete the client?",

          data: clients,

          rowClick: function(args) {
            console.log(args.item);
          },

          fields: [
              { name: "Data de Início", type: "date"},
              { name: "Data de Término", type: "date"}
          ]
      });
     
    });
  @stop

@endsection