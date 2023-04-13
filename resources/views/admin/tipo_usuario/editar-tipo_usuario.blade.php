@extends('layouts.app')

@section('content')
    @if (session('mensagem'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagem') }}
        </div>
    @endif
    <div class="card">
        <h2 class="card-header">
            Editar Tipo de Usuário
        </h2>
        <form class="card-body col row" action="{{ route('editar-tipo_usuario', $tipos_usuario->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="row p-3">
                <div class="col-6">
                    <label for="nome" class="form-label mb-1 mt-3">Campo para editar o nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control"
                        value="{{ $tipos_usuario->nome }}">
                </div>

                <div class="col-6">
                    <label for="quantidade" class="form-label mb-1 mt-3">Campo para editar o slug:</label>
                    <input type="text" name="slug" id="slug" class="form-control"
                        value="{{ $tipos_usuario->slug }}">
                </div>

                <div class="col-12">
                    <label for="quantidade" class="form-label mb-1 mt-3">Campo para editar a descrição:</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="5">{{ $tipos_usuario->descricao }}</textarea>
                </div>

                <div class="">
                    <button class="btn btn-info mt-4" type="submit">Salvar edição</button>
                </div>
        </form>
    </div>
@endsection
