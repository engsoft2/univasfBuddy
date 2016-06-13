@extends('layouts.master')

@include('includes.header')
@include('includes.modal-refeicao')

@section('title')
    Admin
@endsection

@section('content')
  <div class="container-fluid">
    <h2>Editar Cardápio - {{$firstDate}} à {{$lastDate}}</h2>

    <div class="refeicao-container">
      <h3>Almoço</h3>
      <div id="lunch"></div>
    </div>

    <div class="refeicao-container">
      <h3>Jantar</h3>
      <div id="dinner"></div>

      <button type="button" class="btn btn-primary btn-sm" id="salvar-cardapio">
        Salvar Alterações
      </button>
    </div>

  </div>

  @section('scripts')
    $('#salvar-cardapio').on('click', function(){
      $.ajax({
        method: 'POST',
        url: '{{ route('editar') }}',
        data: {
          startDate: '{{$firstDate}}',
          endDate: '{{$lastDate}}',
          lunch: lunch.getData(),
          dinner: dinner.getData(),
          _token: '{{ Session::token() }}'
        }
      })
      .done(function(msg){
        window.location.href = '{{ route('inicio') }}'
        //console.log(msg);
       });
    });
  
    var lunch = [
       @foreach($lunch as $day)
          {saladaCrua:'{{ $day['sld_crua']}}', saladaCozida: '{{$day['sld_cozida']}}', pratoPrincipal: '{{$day['prt_principal']}}', guanicao: '{{$day['guarnicao']}}', cereal: '{{$day['cereal']}}', leguminosa: '{{$day['leguminosa']}}', vegetariano: '{{$day['vegetariano']}}', sobremesa: '{{$day['sobremesa']}}', suco: '{{$day['bebida']}}'},  
        @endforeach 
    ];

    var lunchElement = document.querySelector('#lunch');
    var luchElementContainer = lunchElement.parentNode;
    var luchSettings = {
      data: lunch,
      columns: [
          {
              data: 'saladaCrua',
              type: 'unicode',
              width: 150
          },
          {
              data: 'saladaCozida',
              type: 'unicode',
              width: 150
          },
          {
              data: 'pratoPrincipal',
              type: 'unicode',
              width: 200
          },
          {
              data: 'guanicao',
              type: 'unicode',
              width: 150
          },
                          {
              data: 'cereal',
              type: 'unicode',
              width: 150
          },
          {
              data: 'leguminosa',
              type: 'unicode',
              width: 150
          },
                          {
              data: 'vegetariano',
              type: 'unicode',
              width: 150
          },
          {
              data: 'sobremesa',
              type: 'unicode',
              width: 150
          },
                          {
              data: 'suco',
              type: 'unicode',
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
        @foreach($dinner as $day)
          {saladaCruaCozida: '{{$day['sld_crua']}}', pratoPrincipal: '{{$day['prt_principal']}}', guanicao: '{{$day['guarnicao']}}', cereal: '{{$day['cereal']}}', vegetariano: '{{$day['vegetariano']}}', sopa: '{{$day['sopa']}}', bebida: '{{$day['bebida']}}'},                
        @endforeach 
    ];

    var dinnerElement = document.querySelector('#dinner');
    var dinnerElementContainer = dinnerElement.parentNode;
    var dinnerSettings = {
      data: dinner,
      columns: [
          {
              data: 'saladaCruaCozida',
              type: 'unicode',
              width: 150
          },
          {
              data: 'pratoPrincipal',
              type: 'unicode',
              width: 200
          },
          {
              data: 'guanicao',
              type: 'unicode',
              width: 150
          },
                          {
              data: 'cereal',
              type: 'unicode',
              width: 150
          },
          {
              data: 'vegetariano',
              type: 'unicode',
              width: 150
          },
          {
              data: 'sopa',
              type: 'unicode',
              width: 150
          },
                          {
              data: 'bebida',
              type: 'unicode',
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

  @stop

@endsection