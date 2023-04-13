@extends('layouts.app')

@section('content')
    <div class="card-header shadow">
        <h2>
            Cadastrar Situação
        </h2>
    </div>
    <div class="card p-4 shadow">
        <form class="row" action="{{route('cadastrar-situacao')}}" method="POST">
            {{ csrf_field() }}
            <div class="col-12">
                <label for="nome" class="form-label mb-1 mt-3">Informe o nome:</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>

            <div class="col-12">
                <label for="descricao" class="form-label mb-1 mt-3">Descreva:</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="5"></textarea>
            </div>

            <div class="d-flex">
                <button class="btn btn-info mt-4" type="submit">Salvar cadastro</button>
            </div>

        </form>
    </div>
@endsection

@section('scripts')
@endsection