@extends('layouts.app')

@section('content')
<div class="card p-4 shadow">
    <div class="col-lg-12 d-flex justify-content-between align-itens-center">
        <h2>Manifestação<h2>
            <a href="{{route('vis-cadastro-manifestacao')}}" class="btn btn-success">Cadastrar</a>
        </div> 
        @if (session('mensagem'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagem') }}
        </div>
        @endif
        
    <form action="">
        <div class="d-flex justify-content-end">
            <div class="col-3 mx-3">
                <input type="text" class=" form-control mx-1" placeholder="Protocolo" name="pesquisa" id="pesquisa" class="form-control" value="">
            </div>
            <button class="btn btn-primary" type="submit"><i class="fa-xl fa-solid fa-magnifying-glass text-white" type="submit"></i></button>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Protocolo</th>
            <th>Estado</th>
            <th>Situação</th>
            <th>Autor</th>
            <th>Tipo</th>
            <th>Última alteração</th>
            <th class="text-center">Ações</th>
        </thead>
        <tbody>
            @if (isset($manifestacoes) && count($manifestacoes)>0)
            @foreach ($manifestacoes as $manifestacao)
            <tr>
                <td>
                    {{ $manifestacao->id }}
                </td>
                <td>
                    {{ $manifestacao->protocolo }}
                </td>
                <td>
                    {{ $manifestacao->estadoProcesso->nome }}
                </td>
                <td>
                    {{ $manifestacao->situacao->nome }}
                </td>
                <td>
                    @if($manifestacao->anonimo)
                                <span class="fw-bold">(Anônimo)</span>
                                @else
                                {{ $manifestacao->nome }}
                            @endif
                        </td>
                        <td>
                            {{ $manifestacao->tipoManifestacao->nome }}
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($manifestacao->updated_at)->format('d/m/Y \à\s H:i\h') }}
                        </td>
                        <td class="">
                            <div class="d-flex justify-content-between gap-1">
                                <a href="{{ route('visualizar-manifestacao', ['id' => $manifestacao->id]) }}">
                                    <i class="fa-xl fa-solid fa-magnifying-glass text-primary"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="6">
                        não existem registros!
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class='mx-auto'>
        {{ $manifestacoes->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection