@extends('layouts.app')
@section('content')

<div class="container">
    <p><br></p>
    <div class="d-flex justify-content-md-center align-items-bottom" >
        <h2> Edição de Entradas </h2><br>
    </div>
    <div class="d-flex justify-content-md-center vh-100">
        <div class="col-md-6 offset md-3">
            @if($message = Session::get('danger'))
                <div class="alert alert-danger">
                    <strong>{{ $message }}}</strong>
                </div>
            @endif
            @foreach($entradas as $entrada)
                <form action="{{ action('EntradaController@update', $entrada->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nome">Nome da Entrada</label>
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ $entrada->nome }}">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" >{{ $entrada->descricao }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" name="autor" id="autor" value="{{ $entrada->autor }}">
                    </div>
                    <button type="submit" class="btn btn-warning">Atualizar</button>
                    <a href="{{ action('EntradaController@index') }}" class="btn btn-primary">Voltar</a>
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection