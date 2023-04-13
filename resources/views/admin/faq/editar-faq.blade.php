@extends('layouts.app')

@section('content')
    @if (session('mensagem'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagem') }}
        </div>
    @endif
    <div class="card">
        <h2 class="card-header">
            Editar FAQ
        </h2>
        <form class="card-body row" action="{{ route('editar-faq', $faq->id) }}" method="POST">
            {{ csrf_field() }}
                <div class="row align-items-start">
                    <div class="col-6">
                        <label for="pergunta" class="form-label mb-1 mt-3">Campo para editar a pergunta:</label>
                        <input type="text" name="pergunta" id="pergunta" class="form-control" value="{{ $faq->pergunta }}">
                    </div>

                    <div class="col-6">
                        <label for="resposta" class="form-label mb-1 mt-3">Campo para editar a resposta:</label>
                        <input type="text" name="resposta" id="resposta" class="form-control" value="{{ $faq->resposta }}">
                    </div>

                    <div class="col-6">
                        <button class="btn btn-info mt-4" type="submit">Salvar edição</button>
                    </div>
                </div>
        </form>
    </div>
@endsection