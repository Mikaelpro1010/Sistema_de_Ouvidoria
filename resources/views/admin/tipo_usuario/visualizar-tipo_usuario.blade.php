@extends('layouts.app')
@section('content')
    <div class="card shadow">
        <h3 class="card-header">
            Tipo de Usuário
        </h3>
        <div class="card-body p-3">
            <div class="row align-items-start">
                <div class="col">
                    <label class="fw-bold" for="">Nome:</label>
                    <div class="border-2 border-bottom border-warning">
                        {{ $tipos_usuario->nome }}
                    </div>
                </div>
                <div class="col">
                    <label class="fw-bold" for="">Descrição:</label>
                    <div class="border-2 border-bottom border-warning">
                        @if($tipos_usuario->descricao==null)
                            -
                        @else
                            {{ $tipos_usuario->descricao }}
                        @endif
                    </div>
                </div>
                <div class="col">
                    <label class="fw-bold" for="">Última Alteração:</label>
                    <div class="border-2 border-bottom border-warning">
                        {{ Carbon\Carbon::parse($tipos_usuario->updated_at)->format('d/m/Y \à\s H:i\h') }}
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('listagem-tipo_usuario') }}" class="mt-3 btn btn-warning" tabindex="-1" role="button" aria-disabled="true">
                        <i class="fa-solid fa-chevron-left"></i>
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection