@extends('layouts.app')

@section('content')
    <div class="card p-4 shadow">
        <div class="col-lg-12 d-flex justify-content-between align-itens-center">
            <h2>Secretarias<h2>
                    <a href="{{ route('vis-cadastro-secretarias') }}" class="btn btn-success">Cadastrar</a>
        </div>

        @if (session('mensagem'))
            <div class="alert alert-success" role="alert">
                {{ session('mensagem') }}
            </div>
        @endif

        <form action="">
            <div class="d-flex justify-content-end">
                <div class="col-3 mx-3">
                    <input type="text" class=" form-control mx-1" placeholder="Nome" name="pesquisa" id="pesquisa" class="form-control" value="">
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa-xl fa-solid fa-magnifying-glass text-white" type="submit"></i></button>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>Ativo</th>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Última alteração</th>
                <th class="text-center">Ações</th>
            </thead>
            <tbody>
                @if (isset($secretarias))
                    @foreach ($secretarias as $secretaria)
                        <tr>
                            <td>
                                {{ $secretaria->id }}
                            </td>
                            <td>
                                @if ($secretaria->ativo)
                                    <a class="btn" href="{{ route('ativar-secretarias', ['id' => $secretaria->id]) }}">
                                        <i class="text-success fa-solid fa-circle-check"></i>
                                    </a>
                                @else
                                    <a class="btn" href="{{ route('ativar-secretarias', ['id' => $secretaria->id]) }}">
                                        <i class="text-danger fa-solid fa-circle-xmark"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $secretaria->nome }}
                            </td>
                            <td>
                                {{ $secretaria->sigla }}
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($secretaria->updated_at)->format('d/m/Y \à\s H:i\h') }}
                            </td>
                            <td class="col-md-1">
                                <div class="d-flex justify-content-evenly">
                                    <a href="{{ route('visualizar-secretarias', ['id' => $secretaria->id]) }}">
                                        <i class="fa-xl fa-solid fa-magnifying-glass text-primary"></i>
                                    </a>
                                    <a href="{{ route('vis-editar-secretarias', ['id' => $secretaria->id]) }}">
                                        <i class="fa-xl fa-solid fa-pen-to-square text-warning"></i>
                                    </a>
                                    <a href="javascript:deletar({{ $secretaria->id }})">
                                        <i class="fa-xl fa-solid fa-trash text-danger"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>não existem registros</p>
                @endif
            </tbody>
        </table>
        <div class='mx-auto'>
            {{ $secretarias->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <div id="myModal1" name="id" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deletar elemento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('deletar-secretaria') }}" method="POST">
                        <p>Tem certeza que deseja excluir esses dados?</p>
                        {{ csrf_field() }}
                        <input type="hidden" id="deletar" name="id" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success"
                                onclick="close_modal($secretaria->id)">Deletar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function deletar(id) {
            $('#deletar').val(id);
            $('#myModal1').modal('show');
        }

        function close_modal() {
            $('#myModal1').modal('hide');
        }
    </script>
@endsection
