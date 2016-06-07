@extends('layouts.master')

@include('includes.header')

@include('includes.modal-refeicao')

@section('title')
    Admin
@endsection

@section('content')
  <div class="container-fluid">
    <h2>Cardápio da Semana - DD/MM/YY à DD/MM/YY </h2>

    <div class="refeicao-container">
      <h3>Almoço</h3>
      <div id="lunch"></div>
    </div>
    
    <div class="refeicao-container">
      <h3>Jantar</h3>
      <div id="dinner"></div>
      <a role="button"  href="{{ route('editar-cardapio') }}" class="btn btn-primary btn-sm" id="edit-cardapio">
        Editar
      </a>
    </div>
  </div>

  @section('scripts')
    $( "#dataTable tbody tr" ).on( "click", function() {
      console.log( $( this ).text() );
    });

    var lunch = [
      {saladaCrua: 'Pepino, Alface e Cenoura', saladaCozida: 'Batata Doce, Berinjela e Vagem', pratoPrincipal: 'Costela Bovina ao Molho Barbecue / Filé de Frango na Chapa', guanicao: 'Macarrão ao molho de tomate / Farofa Simples', cereal: 'Arroz Branco/Integral', leguminosa: 'Feijão Preto', vegetariano: 'Suflê de Legumes Vegano', sobremesa: 'Laranja / Pudim', suco: 'Acerola'},
      {saladaCrua: 'Pepino, Alface e Cenoura', saladaCozida: 'Batata Doce, Berinjela e Vagem', pratoPrincipal: 'Costela Bovina ao Molho Barbecue / Filé de Frango na Chapa', guanicao: 'Macarrão ao molho de tomate / Farofa Simples', cereal: 'Arroz Branco/Integral', leguminosa: 'Feijão Preto', vegetariano: 'Suflê de Legumes Vegano', sobremesa: 'Laranja / Pudim', suco: 'Acerola'},
      {saladaCrua: 'Pepino, Alface e Cenoura', saladaCozida: 'Batata Doce, Berinjela e Vagem', pratoPrincipal: 'Costela Bovina ao Molho Barbecue / Filé de Frango na Chapa', guanicao: 'Macarrão ao molho de tomate / Farofa Simples', cereal: 'Arroz Branco/Integral', leguminosa: 'Feijão Preto', vegetariano: 'Suflê de Legumes Vegano', sobremesa: 'Laranja / Pudim', suco: 'Acerola'},
      {saladaCrua: 'Pepino, Alface e Cenoura', saladaCozida: 'Batata Doce, Berinjela e Vagem', pratoPrincipal: 'Costela Bovina ao Molho Barbecue / Filé de Frango na Chapa', guanicao: 'Macarrão ao molho de tomate / Farofa Simples', cereal: 'Arroz Branco/Integral', leguminosa: 'Feijão Preto', vegetariano: 'Suflê de Legumes Vegano', sobremesa: 'Laranja / Pudim', suco: 'Acerola'},
      {saladaCrua: 'Pepino, Alface e Cenoura', saladaCozida: 'Batata Doce, Berinjela e Vagem', pratoPrincipal: 'Costela Bovina ao Molho Barbecue / Filé de Frango na Chapa', guanicao: 'Macarrão ao molho de tomate / Farofa Simples', cereal: 'Arroz Branco/Integral', leguminosa: 'Feijão Preto', vegetariano: 'Suflê de Legumes Vegano', sobremesa: 'Laranja / Pudim', suco: 'Acerola'}
    ];

    var lunchElement = document.querySelector('#lunch');
    var luchElementContainer = lunchElement.parentNode;
    var luchSettings = {
      data: lunch,
      columns: [
          {
              data: 'saladaCrua',
              type: 'text',
              width: 150,
              readOnly: true
          },
          {
              data: 'saladaCozida',
              type: 'text',
              width: 150,
              readOnly: true
          },
          {
              data: 'pratoPrincipal',
              type: 'text',
              width: 200, 
              readOnly: true
          },
          {
              data: 'guanicao',
              type: 'text',
              width: 150,
              readOnly: true
          },
                          {
              data: 'cereal',
              type: 'text',
              width: 150,
              readOnly: true
          },
          {
              data: 'leguminosa',
              type: 'text',
              width: 150,
              readOnly: true
          },
                          {
              data: 'vegetariano',
              type: 'text',
              width: 150,
              readOnly: true
          },
          {
              data: 'sobremesa',
              type: 'text',
              width: 150,
              readOnly: true
          },
                          {
              data: 'suco',
              type: 'text',
              width: 100,
              readOnly: true
          }      
      ],
      autoWrapRow: true,
      rowHeaders: [
          'Segunda-Feira',
          'Terça-Feira',
          'Quarta-Feira',
          'Quinta-Feira',
          'Sexta-feira'
      ],
      colHeaders: [
          'Salada Crua',
          'Salada Cozida',
          'Prato Principal',
          'Guarnição',
          'Cereal',
          'Leguminosa',
          'Vegetariano',
          'Sobremesa',
          'Suco'
      ],
      manualRowResize: true,
      manualColumnResize: true
    };

    var lunch = new Handsontable(lunchElement, luchSettings);

    var dinner = [
      {saladaCruaCozida: 'Vagem, cenoura e beterraba', pratoPrincipal: 'Isca de frango empanado', guanicao: 'Cuscuz com carne', cereal: 'Arroz Branco/Integral' , vegetariano: 'Suflê de Legumes Vegano', sopa: 'Sopa de Feijão', bebida: 'Acerola'},
      {saladaCruaCozida: 'Vagem, cenoura e beterraba', pratoPrincipal: 'Isca de frango empanado', guanicao: 'Cuscuz com carne', cereal: 'Arroz Branco/Integral' , vegetariano: 'Suflê de Legumes Vegano', sopa: 'Sopa de Feijão', bebida: 'Acerola'},
      {saladaCruaCozida: 'Vagem, cenoura e beterraba', pratoPrincipal: 'Isca de frango empanado', guanicao: 'Cuscuz com carne', cereal: 'Arroz Branco/Integral' , vegetariano: 'Suflê de Legumes Vegano', sopa: 'Sopa de Feijão', bebida: 'Acerola'},
      {saladaCruaCozida: 'Vagem, cenoura e beterraba', pratoPrincipal: 'Isca de frango empanado', guanicao: 'Cuscuz com carne', cereal: 'Arroz Branco/Integral' , vegetariano: 'Suflê de Legumes Vegano', sopa: 'Sopa de Feijão', bebida: 'Acerola'},
      {saladaCruaCozida: 'Vagem, cenoura e beterraba', pratoPrincipal: 'Isca de frango empanado', guanicao: 'Cuscuz com carne', cereal: 'Arroz Branco/Integral' , vegetariano: 'Suflê de Legumes Vegano', sopa: 'Sopa de Feijão', bebida: 'Acerola'},
    ];

    var dinnerElement = document.querySelector('#dinner');
    var dinnerElementContainer = dinnerElement.parentNode;
    var dinnerSettings = {
      data: dinner,
      columns: [
          {
              data: 'saladaCruaCozida',
              type: 'text',
              width: 150,
              readOnly: true
          },
          {
              data: 'pratoPrincipal',
              type: 'text',
              width: 200,
              readOnly: true
          },
          {
              data: 'guanicao',
              type: 'text',
              width: 150,
              readOnly: true
          },
                          {
              data: 'cereal',
              type: 'text',
              width: 150,
              readOnly: true
          },
          {
              data: 'vegetariano',
              type: 'text',
              width: 150,
              readOnly: true
          },
          {
              data: 'sopa',
              type: 'text',
              width: 150,
              readOnly: true
          },
                          {
              data: 'bebida',
              type: 'text',
              width: 150,
              readOnly: true
          }      

      ],
      autoWrapRow: true,
      rowHeaders: [
          'Segunda-Feira',
          'Terça-Feira',
          'Quarta-Feira',
          'Quinta-Feira',
          'Sexta-feira'
      ],
      colHeaders: [
          'Salada Crua/Cozida',
          'Prato Principal',
          'Guarnição',
          'Cereal',
          'Vegetariano',
          'Sopa',
          'Bebida'
      ],
      manualRowResize: true,
      manualColumnResize: true
    };


    var dinner = new Handsontable(dinnerElement, dinnerSettings);

    $(document).ready(function(){
      $('#dataInicio').datetimepicker({
          format: 'DD/MM/YYYY'
      });

      $('#dataFim').datetimepicker({
          format: 'DD/MM/YYYY'
      });
    });

  @stop

@endsection