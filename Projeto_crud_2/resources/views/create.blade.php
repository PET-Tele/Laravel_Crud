@extends('layouts.app')
@section('content')

<div class="container">
    <p><br></p>
    <div class="d-flex justify-content-md-center align-items-bottom" >
        <h2> Página de Cadastro de Entradas </h2><br>
    </div>
    <br>
    <div class="d-flex justify-content-md-center vh-100">
        <div class="col-md-6 offset md-3">
            @if($message = Session::get('danger'))
                <div class="alert alert-danger">
                    <strong>{{ $message }}}</strong>
                </div>
            @endif
            <form action="{{ action('EntradaController@store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome da Entrada</label>
                    <input type="text" class="form-control" name="nome" id="nome" required placeholder="Insira a Entrada">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" required placeholder="Insira uma descrição para a Entrada"></textarea>
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" class="form-control" name="autor" id="autor" required placeholder="Insira um telefone para a Entrada">
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="{{ action('EntradaController@index') }}" class="btn btn-primary">Voltar</a>
            </form>
        </div>
    </div>
</div>
@endsection