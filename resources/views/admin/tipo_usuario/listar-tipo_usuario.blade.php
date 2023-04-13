@extends('layouts.app')

@section('content')
    @if (session('mensagem'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagem') }}
        </div>
    @endif
    <div class="card p-4 shadow">
        <div class="col-lg-12 d-flex justify-content-between align-itens-center">
            <h2>Tipo de Usuário<h2>
                <a href="{{ route('vis-cadastro-tipo_usuario') }}" class="btn btn-success">Cadastrar</a>
            </div>
        <form action="">
            <div class="d-flex justify-content-end">
                <div class="col-3 mx-3">
                    <input type="text" class=" form-control mx-1" placeholder="Nome" name="pesquisa" id="pesquisa" class="form-control" value="">
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa-xl fa-solid fa-magnifying-glass text-white" type="submit"></i></button>
            </div>
        </form>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Descrição</th>
                    <th class="text-center">Ações</th>
                </thead>
                <tbody>
                    @if (isset($tipos_usuario))
                        @foreach ($tipos_usuario as $tipo_usuario)
                            <tr>
                                <td>
                                    {{ $tipo_usuario->id }}
                                </td>
                                <td>
                                    {{ $tipo_usuario->nome }}
                                </td>
                                <td>
                                    {{ $tipo_usuario->slug }}
                                </td>
                                <td>
                                    {{ $tipo_usuario->descricao }}
                                </td>
                                <td class="col-md-1">
                                    <div class="d-flex justify-content-evenly">
                                        <a href="{{ route('visualizar-tipo_usuario', ['id' => $tipo_usuario->id]) }}">
                                            <i class="fa-xl fa-solid fa-magnifying-glass text-primary"></i>
                                        </a>
                                        <a href="{{ route('vis-editar-tipo_usuario', ['id' => $tipo_usuario->id]) }}">
                                            <i class="fa-xl fa-solid fa-pen-to-square text-warning"></i>
                                        </a>
                                        <a href="javascript:deletar({{ $tipo_usuario->id }})">
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
        </div>
    </div>
    <div class='mx-auto'>
        {{ $tipos_usuario->links('pagination::bootstrap-4') }}
    </div>
    <div id="myModal1" name="id" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deletar elemento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('deletar-tipo_usuario') }}" method="POST">
                        <p>Tem certeza que deseja excluir esses dados?</p>
                        {{ csrf_field() }}
                        <input type="hidden" id="deletar" name="id" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" onclick="close_modal()">Deletar</button>
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
