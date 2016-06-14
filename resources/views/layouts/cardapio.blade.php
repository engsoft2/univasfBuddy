@extends('layouts.master')

@include('includes.header')

@include('includes.modal-refeicao')

@section('title')
    Admin
@endsection

@section('content')
<div class="container-fluid">
  @if(is_null($firstDate) and is_null($lastDate))
  <h2>Cardápio da Semana</h2> @else
  <h2>Cardápio da Semana - {{$firstDate}} à {{$lastDate}} </h2> @endif

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
      <input type='submit' class="btn btn-primary btn-sm" id="edit-cardapio" value="Editar" />
    </form>
    @endif
  </div>
</div>
@endsection

@section('scripts')

    @unless(is_null($lunch))
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

      var isReadOnly = true;
      @include('includes.js.lunch_spreadsheet');
      @include('includes.js.dinner_spreadsheet');

    @endunless

    $(document).ready(function() {
      $('#dataInicio').datetimepicker({
        format: 'DD/MM/YYYY'
      });

      $('#dataFim').datetimepicker({
        format: 'DD/MM/YYYY'
      });
    });
@stop
