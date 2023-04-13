@extends('layouts.app')

@section('content')
    @if (session('mensagem'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagem') }}
        </div>
    @endif
    <div class="card">
        <h2 class="card-header">
            Editar Secretaria
        </h2>
        <form class="card-body row" action="{{ route('editar-secretarias', $secretaria->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="col-6">
                <label for="nome" class="form-label mb-1 mt-3">Campo para editar o nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $secretaria->nome }}">
            </div>

            <div class="col-6">
                <label for="nome" class="form-label mb-1 mt-3">Campo para editar a sigla:</label>
                <input type="text" name="sigla" id="sigla" class="form-control" value="{{ $secretaria->sigla }}">
            </div>

            <div class="">
                <button class="btn btn-info mt-4" type="submit">Salvar edição</button>
            </div>
        </form>
    </div>
@endsection