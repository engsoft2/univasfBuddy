@extends('layouts.master')

@include('includes.header')
@include('includes.modal-refeicao')

@section('title')
    Admin
@endsection

@section('content')
  <h2>Criar Cardápio</h2>
  <!--<div class="cardapio-container">-->
    <div class="almoco-container">
      <h3>Almoço</h3>
      <div id="lunch"></div>

    </div>

    <div class="janta-container">
      <h3>Jantar</h3>
      <div id="dinner"></div>
    </div>
  <!--</div>-->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#save-modal">
    Salvar
  </button>

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

  var dataObject = [
      {},
      {},
      {},
      {},
      {}  
    ];

    var lunchElement = document.querySelector('#lunch');
    var luchElementContainer = lunchElement.parentNode;
    var luchSettings = {
      data: dataObject,
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

    var dinnerElement = document.querySelector('#dinner');
    var dinnerElementContainer = dinnerElement.parentNode;
    var dinnerSettings = {
      data: dataObject,
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
      width: 1300,
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


    var dinner = new Handsontable(dinnerElement, dinnerSettings);
  });

  @stop

@endsection