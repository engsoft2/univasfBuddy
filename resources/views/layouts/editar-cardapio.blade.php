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
@endsection

@section('scripts')
    $('#salvar-cardapio').on('click', function() {
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
      }).done(function(msg) {
        window.location.href = '{{ route('inicio') }}'
      });
    });

    var lunch = [
      @foreach($lunch as $day)
        {
            saladaCrua:       '{{ $day['sld_crua']      }}',
            saladaCozida:     '{{ $day['sld_cozida']    }}',
            pratoPrincipal:   '{{ $day['prt_principal'] }}',
            guanicao:         '{{ $day['guarnicao']     }}',
            cereal:           '{{ $day['cereal']        }}',
            leguminosa:       '{{ $day['leguminosa']    }}',
            vegetariano:      '{{ $day['vegetariano']   }}',
            sobremesa:        '{{ $day['sobremesa']     }}',
            suco:             '{{ $day['bebida']        }}'
        },
      @endforeach
    ];

    var dinner = [
      @foreach($dinner as $day)
        {
            saladaCruaCozida: '{{ $day['sld_crua']        }}',
            pratoPrincipal:   '{{ $day['prt_principal']   }}',
            guanicao:         '{{ $day['guarnicao']       }}',
            cereal:           '{{ $day['cereal']          }}',
            vegetariano:      '{{ $day['vegetariano']     }}',
            sopa:             '{{ $day['sopa']            }}',
            bebida:           '{{ $day['bebida']          }}'
        },
      @endforeach
    ];

    var isReadOnly = false;
    @include('includes.js.lunch_spreadsheet');
    @include('includes.js.dinner_spreadsheet');

@stop
