@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>
            Cadastrar Tipo de Usuário
        </h2>
    </div>
    <div class="card-body shadow p-4">
        <form class="row" action="{{route('cadastrar-tipo_usuario')}}" method="POST">
            {{ csrf_field() }}
            <div class="col-6">
                <label for="nome" class="form-label mb-1 mt-3">Informe o nome:</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>

            <div class="col-6">
                <label for="descricao" class="form-label mb-1 mt-3">Informe o Slug:</label>
                <input type="text" name="slug" id="slug" class="form-control">
            </div>
            
            <div class="col-12">
                <label for="descricao" class="form-label mb-1 mt-3">Descreva:</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="5"></textarea>
            </div>

            <div>
                <button class="btn btn-info mt-4" type="submit">Salvar cadastro</button>
            </div>

        </form>
    </div>
</div>
@endsection