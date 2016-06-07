@extends('layouts.master')

@include('includes.header')
@include('includes.modal-refeicao')

@section('title')
    Admin
@endsection

@section('content')
  <div class="container-fluid">
    <h2>Editar Cardápio</h2>

    <div class="refeicao-container">
      <h3>Almoço</h3>
      <div id="lunch"></div>
    </div>

    <div class="refeicao-container">
      <h3>Jantar</h3>
      <div id="dinner"></div>

      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#save-modal">
        Salvar Alterações
      </button>
    </div>

  </div>

  @section('scripts')
    $(document).ready(function() {  
      $('#dataForm').formValidation({
          framework: 'bootstrap',
          excluded: ':disabled',
          icon: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              dataInicio: {
                  validators: {
                      notEmpty: {
                          message: 'Insira uma data de início.'
                      }
                  }
              },
              dataFim: {
                  validators: {
                      notEmpty: {
                          message: 'Insira uma data de término.'
                      }
                  }
              }
          }
      }).on('success.form.fv', function(e) {

         e.preventDefault();

            // You can get the form instance
            var $form = $(e.target);

            // and the FormValidation instance
            var fv = $form.data('formValidation');

        console.log(JSON.stringify({data: lunch.getData()}));
        console.log($('#dataInicio').val());
        console.log($('#dataFim').val());
        $("#save-modal").modal('toggle');
        // $.ajax({
        // method: 'POST',
        // url: url,
        // data: {date: date, lunch: lunch.getData(), dinner: dinner.getData(), _token: token}
        // })
        // .done(function(msg){
        // console.log(msg['message']);
        //  });

      });

      $('#dataInicio').datetimepicker({
        format: 'DD/MM/YYYY'
      }).on('dp.change dp.show', function(e) {
        $('#dataForm').formValidation('revalidateField', 'dataInicio');
      });

      $('#dataFim').datetimepicker({
        format: 'DD/MM/YYYY'
      }).on('dp.change dp.show', function(e) {
        $('#dataForm').formValidation('revalidateField', 'dataFim');
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
              width: 150
          },
          {
              data: 'saladaCozida',
              type: 'text',
              width: 150
          },
          {
              data: 'pratoPrincipal',
              type: 'text',
              width: 200
          },
          {
              data: 'guanicao',
              type: 'text',
              width: 150
          },
                          {
              data: 'cereal',
              type: 'text',
              width: 150
          },
          {
              data: 'leguminosa',
              type: 'text',
              width: 150
          },
                          {
              data: 'vegetariano',
              type: 'text',
              width: 150
          },
          {
              data: 'sobremesa',
              type: 'text',
              width: 150
          },
                          {
              data: 'suco',
              type: 'text',
              width: 100
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
              width: 150
          },
          {
              data: 'pratoPrincipal',
              type: 'text',
              width: 200
          },
          {
              data: 'guanicao',
              type: 'text',
              width: 150
          },
                          {
              data: 'cereal',
              type: 'text',
              width: 150
          },
          {
              data: 'vegetariano',
              type: 'text',
              width: 150
          },
          {
              data: 'sopa',
              type: 'text',
              width: 150
          },
                          {
              data: 'bebida',
              type: 'text',
              width: 150
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
  });

  @stop

@endsection