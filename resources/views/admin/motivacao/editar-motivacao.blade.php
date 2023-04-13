@extends('layouts.app')

@section('content')
    @if (session('mensagem'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagem') }}
        </div>
    @endif
    <div class="card">
        <h2 class="card-header">
            Editar Motivação
        </h2>
        <form class="card-body row" action="{{ route('editar-motivacao', $motivacao->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="col-6">
                <label for="nome" class="form-label mb-1 mt-3">Campo para editar o nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $motivacao->nome }}">
            </div>

            <div class="col-6">
                <label for="quantidade" class="form-label mb-1 mt-3">Campo para editar a descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="5">{{ $motivacao->descricao }}</textarea>
            </div>

            <div class="col-6">
                <button class="btn btn-info mt-4" type="submit">Salvar edição</button>
            </div>
        </form>
    </div>
@endsection