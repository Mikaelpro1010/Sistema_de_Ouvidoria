@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                Cadastrar Secretarias
            </h2>
        </div>
        <div class="card-body p-4 shadow">
            <form class="row" action="{{route('cadastrar-secretaria')}}" method="POST">
                {{ csrf_field() }}
                <div class="col-12">
                    <label for="nome" class="form-label mb-1 mt-3">Informe o nome da Secretaria:</label>
                    <input type="text" name="nome" id="nome" class="form-control">
                </div>

                <div class="col-12">
                    <label for="sigla" class="form-label mb-1 mt-3">Informe a sigla da Secretaria:</label>
                    <input type="text" name="sigla" id="sigla" class="form-control">
                </div>

                <div class="d-flex">
                    <button class="btn btn-info mt-4" type="submit">Salvar cadastro</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection