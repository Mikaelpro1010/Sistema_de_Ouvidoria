@extends('layouts.app')
@section('content')
    <div class="card">
        <h3 class="card-header">
            Situação
        </h3>
        <div class="card-body p-3 shadow">
            <div class="row align-items-start">
                <div class="col">
                    <label class="fw-bold" for="">Nome:</label>
                    <div class="border-2 border-bottom border-warning">
                        {{ $situacao->nome }}
                    </div>
                </div>
                <div class="col">
                    <label class="fw-bold" for="">Descrição:</label>
                    <div class="border-2 border-bottom border-warning">
                        @if($situacao->descricao==null)
                            -
                        @else
                            {{ $situacao->descricao }}
                        @endif
                    </div>
                </div>
                <div class="col">
                    <label class="fw-bold" for="">Ativo:</label>
                    <div class="border-2 border-bottom border-warning">
                        @if(true)
                            <i class="text-success fa-solid fa-circle-check"></i>
                        @else
                            <i class="fa-solid fa-circle-xmark"></i>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <label class="fw-bold" for="">Última Alteração:</label>
                    <div class="border-2 border-bottom border-warning">
                        {{ Carbon\Carbon::parse($situacao->updated_at)->format('d/m/Y \à\s H:i\h') }}
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('listagem-situacao') }}" class="mt-3 btn btn-warning" tabindex="-1" role="button" aria-disabled="true">
                        <i class="fa-solid fa-chevron-left"></i>
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection