@extends('layouts.app')

@section('content')
    <div class="card p-4 shadow">
        <div id="mensagem">
        </div>
        <div class="col-lg-12 d-flex justify-content-between align-itens-center">
            <h2>FAQ<h2>
                    <a href="{{ route('vis-cadastro-faq') }}" class="btn btn-success">Cadastrar</a>
        </div>
        @if (session('mensagem'))
            <div class="alert alert-success" role="alert">
                {{ session('mensagem') }}
            </div>
        @endif

        <form action="">
            <div class="d-flex justify-content-end">
                <div class="col-3 mx-3">
                    <input type="text" class=" form-control mx-1" placeholder="Perguntas" name="pesquisa" id="pesquisa"
                        class="form-control" value="{{ request()->pesquisa }}">
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa-xl fa-solid fa-magnifying-glass text-white" type="submit"></i></button>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <th></th>
                <th>Id</th>
                <th>Ativo</th>
                <th>Perguntas</th>
                <th class="text-center">Ações</th>
            </thead>
            <tbody id="tabela">
                @if (isset($faqs) && count($faqs) > 0)
                    @foreach ($faqs as $faq)
                        <tr id=" {{ $faq->id }} ">
                            <td>
                                <i class="fa-solid fa-sort"></i>
                            </td>
                            <td>
                                @if ($faq->ativo)
                                    <a class="btn" href="{{ route('ativar-faq', ['id' => $faq->id]) }}">
                                        <i class="text-success fa-solid fa-circle-check"></i>
                                    </a>
                                @else
                                    <a class="btn" href="{{ route('ativar-faq', ['id' => $faq->id]) }}">
                                        <i class="text-danger fa-solid fa-circle-xmark"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $faq->id }}
                            </td>
                            <td class="">
                                {{ substr($faq->pergunta, 0, 100) . '...' }}
                            </td>
                            <td class="col-md-1">
                                <div class="d-flex justify-content-evenly">
                                    <a href="{{ route('visualizar-faq', ['id' => $faq->id]) }}">
                                        <i class="fa-xl fa-solid fa-magnifying-glass text-primary"></i>
                                    </a>
                                    <a href="{{ route('vis-editar-faq', ['id' => $faq->id]) }}">
                                        <i class="fa-xl fa-solid fa-pen-to-square text-warning"></i>
                                    </a>
                                    <a href="javascript:deletar({{ $faq->id }})">
                                        <i class="fa-xl fa-solid fa-trash text-danger"></i>
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
            {{ $faqs->links('pagination::bootstrap-4') }}
        </div>
        <div id="myModal1" name="id" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Deletar elemento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" action="{{ route('deletar-faq') }}" method="POST">
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

        $(document).ready(function() {
            $(function() {
                $("#tabela").sortable({
                    update: function() {
                        var ordem_atual = $(this).sortable("toArray");
                        $.ajax({
                            url: "{{ route('ordenar-faq') }}",
                            type: "post",
                            dataType: 'json',
                            data: {
                                'ordem': ordem_atual,
                                "_token": "{{ csrf_token() }}",
                            }
                        }).done(function(reponse) {
                            if (true) {
                                $('#mensagem').html(`
                                    <div class="alert alert-success" role="alert">
                                        FAQ ordenado com sucesso!
                                    </div>
                                    `);
                                $("#mensagem").slideDown('slow');
                                retirarMsg();
                            }
                        });
                    }
                });
            });


            //Retirar a mensagem após 1700 milissegundos
            function retirarMsg() {
                setTimeout(function() {
                    $("#mensagem").slideUp('slow', function() {});
                }, 1700);
            }
        });
    </script>
@endsection
