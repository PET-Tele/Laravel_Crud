@extends('layouts.app')
@section('content')

<div class="container">
    <p><br></p>
    @foreach($entradas as $entrada)
        <div class="d-flex justify-content-md-center align-items-bottom" >
            <h2>{{$entrada->nome}}</h2>
            <br>
        </div>
        <div class="card mx-auto" style="width: 350px">
            <img class="card-img-top" src="http://via.placeholder.com/350x150?text={{$entrada->autor}}"/>
            <div class="card-body">
                <div class="card-title">{{$entrada->nome}}</div>
                <p class="card-text">{{ $entrada->descricao}}</p>
                <a href="{{ action('EntradaController@index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    @endforeach
</div>
@endsection