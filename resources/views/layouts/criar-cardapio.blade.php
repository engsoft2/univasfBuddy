@extends('layouts.master')

@include('includes.header')
@include('includes.modal-refeicao')

@section('title')
    Admin
@endsection

@section('content')
  <h2>Criar Cardápio</h2>
  <div class="container cardapio-container">
    <div class="almoco-container">
      <h3>Almoço</h3>
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
        </table>  
      </div>    
      <button type="button" class="btn btn-xs btn-default pull-right">Deletar</button>
      <button type="button" class="btn btn-xs btn-default pull-right">Editar</button>
      <button class="btn btn-default btn-xs editButton pull-right" class="criarButton">Nova Refeição</button>

    </div>

    <div class="janta-container">
      <h3>Jantar</h3>
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
          <tbody>
                <tr class="novaRefeicao">

                </tr>
            </tbody>
        </table>  
      </div>    
      <button type="button" class="btn btn-xs btn-default pull-right">Deletar</button>
      <button type="button" class="btn btn-xs btn-default pull-right">Editar</button>
      <button class="btn btn-default btn-xs editButton pull-right">Nova Refeição</button>
    </div>
  </div>
  <button type="button" class="btn btn-default saveButton">Salvar</button>

@endsection