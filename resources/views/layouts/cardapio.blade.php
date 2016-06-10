@extends('layouts.master')

@include('includes.header')

@include('includes.modal-refeicao')

@section('title')
    Admin
@endsection

@section('content')
  <div class="container-fluid">
    @if(is_null($firstDate) and is_null($lastDate))
      <h2>Cardápio da Semana</h2>
    @else
      <h2>Cardápio da Semana - {{$firstDate}} à {{$lastDate}} </h2>
    @endif

    <div class="refeicao-container">
      <h3>Almoço</h3>
      <div id="lunch"></div>
      @if(is_null($lunch))
        <p>Não há cardápios cadastrados. Cadastre agora!</p>
      @endif
    </div>
    
    <div class="refeicao-container">
      <h3>Jantar</h3>
      <div id="dinner"></div>
      @if(is_null($dinner))
        <p>Não há cardápios cadastrados. Cadastre agora!</p>
      @else
        <form action="{{ route('editar-cardapio') }}" method="post">
          <input type="hidden" name="_token" value="{{ Session::token() }}" />
          <input type="hidden" name="firstDate" value="{{ $firstDate  }}" />
          <input type="hidden" name="lastDate" value="{{ $lastDate  }}" />
          <input type="hidden" name="lunch" value="{{ $lunch  }}" />
          <input type="hidden" name="dinner" value="{{ $dinner  }}" />
          <input type='submit' class="btn btn-primary btn-sm" id="edit-cardapio" value="Editar"/>
        </form>         
      @endif     
    </div>
  </div>

  @section('scripts')

    $( "#dataTable tbody tr" ).on( "click", function() {
      console.log( $( this ).text() );
    });

    
      /*{saladaCrua: 'Pepino, Alface e Cenoura', saladaCozida: 'Batata Doce, Berinjela e Vagem', pratoPrincipal: 'Costela Bovina ao Molho Barbecue / Filé de Frango na Chapa', guanicao: 'Macarrão ao molho de tomate / Farofa Simples', cereal: 'Arroz Branco/Integral', leguminosa: 'Feijão Preto', vegetariano: 'Suflê de Legumes Vegano', sobremesa: 'Laranja / Pudim', suco: 'Acerola'},
      {saladaCrua: 'Pepino, Alface e Cenoura', saladaCozida: 'Batata Doce, Berinjela e Vagem', pratoPrincipal: 'Costela Bovina ao Molho Barbecue / Filé de Frango na Chapa', guanicao: 'Macarrão ao molho de tomate / Farofa Simples', cereal: 'Arroz Branco/Integral', leguminosa: 'Feijão Preto', vegetariano: 'Suflê de Legumes Vegano', sobremesa: 'Laranja / Pudim', suco: 'Acerola'},
      {saladaCrua: 'Pepino, Alface e Cenoura', saladaCozida: 'Batata Doce, Berinjela e Vagem', pratoPrincipal: 'Costela Bovina ao Molho Barbecue / Filé de Frango na Chapa', guanicao: 'Macarrão ao molho de tomate / Farofa Simples', cereal: 'Arroz Branco/Integral', leguminosa: 'Feijão Preto', vegetariano: 'Suflê de Legumes Vegano', sobremesa: 'Laranja / Pudim', suco: 'Acerola'},
      {saladaCrua: 'Pepino, Alface e Cenoura', saladaCozida: 'Batata Doce, Berinjela e Vagem', pratoPrincipal: 'Costela Bovina ao Molho Barbecue / Filé de Frango na Chapa', guanicao: 'Macarrão ao molho de tomate / Farofa Simples', cereal: 'Arroz Branco/Integral', leguminosa: 'Feijão Preto', vegetariano: 'Suflê de Legumes Vegano', sobremesa: 'Laranja / Pudim', suco: 'Acerola'},
      {saladaCrua: 'Pepino, Alface e Cenoura', saladaCozida: 'Batata Doce, Berinjela e Vagem', pratoPrincipal: 'Costela Bovina ao Molho Barbecue / Filé de Frango na Chapa', guanicao: 'Macarrão ao molho de tomate / Farofa Simples', cereal: 'Arroz Branco/Integral', leguminosa: 'Feijão Preto', vegetariano: 'Suflê de Legumes Vegano', sobremesa: 'Laranja / Pudim', suco: 'Acerola'}*/
      


    @unless(is_null($lunch))
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
        /*{saladaCruaCozida: 'Vagem, cenoura e beterraba', pratoPrincipal: 'Isca de frango empanado', guanicao: 'Cuscuz com carne', cereal: 'Arroz Branco/Integral' , vegetariano: 'Suflê de Legumes Vegano', sopa: 'Sopa de Feijão', bebida: 'Acerola'},
        {saladaCruaCozida: 'Vagem, cenoura e beterraba', pratoPrincipal: 'Isca de frango empanado', guanicao: 'Cuscuz com carne', cereal: 'Arroz Branco/Integral' , vegetariano: 'Suflê de Legumes Vegano', sopa: 'Sopa de Feijão', bebida: 'Acerola'},
        {saladaCruaCozida: 'Vagem, cenoura e beterraba', pratoPrincipal: 'Isca de frango empanado', guanicao: 'Cuscuz com carne', cereal: 'Arroz Branco/Integral' , vegetariano: 'Suflê de Legumes Vegano', sopa: 'Sopa de Feijão', bebida: 'Acerola'},
        {saladaCruaCozida: 'Vagem, cenoura e beterraba', pratoPrincipal: 'Isca de frango empanado', guanicao: 'Cuscuz com carne', cereal: 'Arroz Branco/Integral' , vegetariano: 'Suflê de Legumes Vegano', sopa: 'Sopa de Feijão', bebida: 'Acerola'},
        {saladaCruaCozida: 'Vagem, cenoura e beterraba', pratoPrincipal: 'Isca de frango empanado', guanicao: 'Cuscuz com carne', cereal: 'Arroz Branco/Integral' , vegetariano: 'Suflê de Legumes Vegano', sopa: 'Sopa de Feijão', bebida: 'Acerola'},*/

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

    @endunless

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