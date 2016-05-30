@extends('layouts.master')

@include('includes.header')

@section('title')
    Welcome!
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Faça login</h2>
            <form action="{{ route('signin') }}" method='post'>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}"></input>
                </div>
                <div class="form-group {{ $errors->has('senha') ? 'has-error' : '' }}">
                    <label for="senha">Senha</label>
                    <input class="form-control" type="password" name="senha" id="senha" value="{{ Request::old('senha') }}"></input>
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>        
    </div>
@endsection