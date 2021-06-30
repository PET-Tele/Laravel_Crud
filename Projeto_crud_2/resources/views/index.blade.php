@extends('layouts.app')
@section('content')

<div class="container">
    <p><br></p>
    @if ($message = Session::get('success'))
        <br>
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br>
    <div class="row">
        <div class="col-md-6">
            <h1>CRUD Genérico</h1>
        </div>
        <div class="col-md-4">
            <form action="/search" method="get">
                <div class="input-group" style="margin: 5px 0 5px 0;">
                    <input class="form-control" type="search" name="search" placeholder="Procure por nome">
                    <span class="form-group-prepend">
                        <button type="submit" class="btn btn-primary">Procurar</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-2 text-md-right" style="margin: 5px 0 5px 0;">
            <a href="{{ action('EntradaController@create') }}" class="btn btn-success">Nova Entrada</a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" style="background:white;">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Autor</th>
                        <th width="260px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entradas as $entrada)
                    <tr>
                        <td>{{ $entrada->id }}</td>
                        <td>{{ $entrada->nome }}</td>
                        <td>{{ $entrada->descricao}}</td>
                        <td>{{ $entrada->autor }}</td>
                        <td>
                            <form class="text-center" method="post" action="{{ action('EntradaController@destroy', $entrada->id) }}">
                                <a href="{{ action('EntradaController@show', $entrada->id) }}" class="btn btn-info text-center" style="margin: 3px 0 3px 0; width:75px">Mostrar</a>
                                <a href="{{ action('EntradaController@edit', $entrada->id) }}" class="btn btn-primary text-center" style="margin: 3px 0 3px 0; width:75px">Editar</a>
                                @csrf
                                @method('DELETE')       
                                <button type="submit" class="btn btn-danger text-center" style="margin: 3px 0 3px 0; width:75px">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="pagination">
        {{ $entradas->links() }}
    </div>
</div>
    @endsection
