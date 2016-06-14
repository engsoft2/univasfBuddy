@extends('layouts.master')

@include('includes.header')
@include('includes.modal-refeicao')

@section('title') Admin @endsection

@section('content')
<div class="container-fluid">
    <h2>Criar Cardápio</h2>

    <div class="refeicao-container">
        <h3>Almoço</h3>
        <div id="lunch"></div>
    </div>

    <div class="refeicao-container">
        <h3>Jantar</h3>
        <div id="dinner"></div>

        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#save-modal" id="salvar-cardapio">
            Salvar
        </button>
    </div>

</div>
@endsection

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

            //console.log(JSON.stringify({data: lunch.getData()}));
            //console.log($('#dataInicio').val());
            //console.log($('#dataFim').val());
            $("#save-modal").modal('toggle');
            $.ajax({
                method: 'POST',
                url: '{{ route('salvar-cardapio') }}',
                data: {
                    startDate: $('#dataInicio').val(),
                    endDate: $('#dataFim').val(),
                    lunch: lunch.getData(),
                    dinner: dinner.getData(),
                    _token: '{{ Session::token() }}'
                }
            })
            .done(function(msg){
                window.location.href = '{{ route('inicio') }}'
                //console.log(JSON.stringify(msg));
            });

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

        var isReadOnly = true;
        @include('includes.js.lunch_spreadsheet');
        @include('includes.js.dinner_spreadsheet');

    });

@stop
