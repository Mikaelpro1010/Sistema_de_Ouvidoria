@extends('layouts.app')
@section('content')
    @if (session('mensagem'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagem') }}
        </div>
    @endif
    @if (!$manifestacao->anonimo)
        <div class="accordion mb-3">
            <div class="accordion-item mb-3">
                <h3 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Dados Pessoais:
                    </button>
                </h3>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row align-items-start">
                            <div class="col">
                                <label class="fw-bold" for="">Nome:</label>
                                <p class="border-2 border-bottom border-warning">{{ $manifestacao->nome }}</p>
                            </div>
                            <div class="col">
                                <label class="fw-bold" for="">E-mail:</label>
                                <p class="border-2 border-bottom border-warning">{{ $manifestacao->email }}</p>
                            </div>
                            <div class="col">
                                <label class="fw-bold" for="">Telefone:</label>
                                <p class="border-2 border-bottom border-warning">{{ $manifestacao->numero_telefone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Endereço:
                    </button>
                </h3>
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row align-items-start">
                            <div class="col">
                                <label class="fw-bold" for="">Endereço:</label>
                                <p class="border-2 border-bottom border-warning">{{ $manifestacao->endereco }}</p>
                            </div>
                            <div class="col">
                                <label class="fw-bold" for="">Bairro:</label>
                                <p class="border-2 border-bottom border-warning">{{ $manifestacao->bairro }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="accordion-item mb-3">
        <h3 class="accordion-header">
            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                Manifestação: {{ $manifestacao->protocolo }}
            </button>
        </h3>
        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row align-items-start">
                    <div class="col">
                        <label class="fw-bold" for="">Situação:</label>
                        <p class="border-2 border-bottom border-warning">{{ $manifestacao->situacao->nome }}</p>
                    </div>
                    <div class="col">
                        <label class="fw-bold" for="">Protocolo:</label>
                        <p class="border-2 border-bottom border-warning">{{ $manifestacao->protocolo }}</p>
                    </div>
                    <div class="col">
                        <label class="fw-bold" for="">Data de abertura:</label>
                        <p class="border-2 border-bottom border-warning">{{ $manifestacao->created_at }}</p>
                    </div>
                    <div class="col">
                        <label class="fw-bold" for="">Tipo Manifestação:</label>
                        <p class="border-2 border-bottom border-warning">{{ $manifestacao->tipoManifestacao->nome }}</p>
                    </div>
                    <div class="col-3 bg-secondary">
                        <label class="fw-bold" for="">Protocolo:</label>
                        <p class="border-2 border-bottom border-warning">{{ $manifestacao->protocolo }}</p>
                        <label class="fw-bold" for="">Senha:</label>
                        <p class="border-2 border-bottom border-warning">{{ $manifestacao->senha }}</p>
                    </div>

                    <label class="fw-bold" for="">Descrição da Manifestação:</label>
                    <p class="border-2 border-bottom border-warning">{{ $manifestacao->manifestacao }}</p>
                </div>
            </div>
        </div>
    </div>

    @if ($manifestacao->recursos->isNotEmpty())
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    Recurso:
                </button>
            </h3>
            <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    @foreach ($manifestacao->recursos as $recurso)
                        <div class="border p-3 mb-3">
                            <p class="border-2 border-bottom border-warning">{{ $recurso->recurso }}</p>
                            <div>
                                <button class="btn btn-info" onclick="recurso({{ $recurso->id }})">Resposta ao
                                    recurso</button>
                            </div>
                        </div>
                        <div id="recurso-{{ $recurso->id }}" name="id" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Resposta</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class=""
                                            action="{{ route('criar-resposta', [$manifestacao->id, $recurso->id]) }}"
                                            method="POST">
                                            <p>Resposta referente ao recurso:</p>
                                            <textarea class="mb-3 form-control" name="resposta" placeholder="Mensagem*" id="resposta" rows="5"></textarea>
                                            {{ csrf_field() }}
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success"
                                                    onclick="close_modal()">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="card p-3 mt-3 mb-3">
        <ul class="bg-warning nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="inicial" data-bs-toggle="tab" data-bs-target="#inicial"
                    type="button" role="tab" aria-controls="inicial" aria-selected="true">Inicial</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#anexos" type="button"
                    role="tab" aria-controls="anexos" aria-selected="false">Anexos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#respostas" type="button"
                    role="tab" aria-controls="respostas" aria-selected="false">Respostas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#compartilhamentos"
                    type="button" role="tab" aria-controls="compartilhamentos"
                    aria-selected="false">Compartilhamentos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#prorrogacao"
                    type="button" role="tab" aria-controls="prorrogacao" aria-selected="false">Prorrogação</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="inicial" role="tabpanel" aria-labelledby="inicial"
                tabindex="0">1...</div>
            <div class="tab-pane fade" id="anexos" role="tabpanel" aria-labelledby="anexos" tabindex="0">
                <label for="" class="fw-bold">Anexos</label>
                <table class="table table-striped">
                    <thead>
                        <th>Nome</th>
                        <th>Tipo</th>
                    </thead>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane fade" id="respostas" role="tabpanel" aria-labelledby="respostas" tabindex="0">
                <form action="{{ route('criar-respostas', $manifestacao->id) }}" method="POST">
                    {{ csrf_field() }}
                    @if ($manifestacao->contextualizacao == null &&
                        $manifestacao->providencia_adotada == null &&
                        $manifestacao->conclusao == null)
                        <label class="mt-3 fw-bold" for="">Contextualização:</label>
                        <textarea class="mb-3 form-control" required name="contextualizacao" placeholder="Mensagem*" id="contextualizacao"
                            rows="5"></textarea>

                        <label class="fw-bold" for="">Providência Adotada:</label>
                        <textarea class="mb-3 form-control" required name="providencia_adotada" placeholder="Mensagem*"
                            id="providencia_adotada" rows="5"></textarea>

                        <label class="fw-bold" for="">Conclusão(Resposta ao cidadão):</label>
                        <textarea class="form-control" required name="conclusao" placeholder="Mensagem*" id="conclusao" rows="5"></textarea>

                        <div>
                            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
                        </div>
                    @else
                        <label class="mt-3 fw-bold" for="">Contextualização:</label>
                        <textarea class="mb-3 form-control" disabled name="contextualizacao" placeholder="Mensagem*" id="contextualizacao"
                            rows="5">{{ $manifestacao->contextualizacao }}</textarea>

                        <label class="fw-bold" for="">Providência Adotada:</label>
                        <textarea class="mb-3 form-control" disabled name="providencia_adotada" placeholder="Mensagem*"
                            id="providencia_adotada" rows="5">{{ $manifestacao->providencia_adotada }}</textarea>

                        <label class="fw-bold" for="">Conclusão(Resposta ao cidadão):</label>
                        <textarea class="form-control required" disabled name="conclusao" placeholder="Mensagem*" id="conclusao"
                            rows="5">{{ $manifestacao->conclusao }}</textarea>
                    @endif
                </form>
            </div>
            <div class="tab-pane fade" id="compartilhamentos" role="tabpanel" aria-labelledby="compartilhamentos"
                tabindex="0">
                <button type="submit" class="mt-3 btn btn-primary" onclick="compartilhar()">
                    Compartilhar manifestação
                </button>
            </div>
            <div class="p-3 tab-pane fade" id="prorrogacao" role="tabpanel" aria-labelledby="prorrogacao"
                tabindex="0">
                @if ($manifestacao->prorrogacao->count() > 0)
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Data de Solicitação</th>
                            <th>Motivo da Solicitação</th>
                            <th>Solicitante</th>
                            <th>Resposta</th>
                            <th>Situação</th>
                            <th>Data da Resposta</th>
                        </thead>
                        <tbody>
                            @foreach ($manifestacao->prorrogacao as $prorrogacao)
                                <tr>
                                    <td>{{ $prorrogacao->id }}</td>
                                    <td>{{ $prorrogacao->created_at }}</td>
                                    <td>{{ $prorrogacao->motivo_solicitacao }}</td>
                                    <td>{{ $prorrogacao->user->name }}</td>
                                    <td>{{ $prorrogacao->resposta }}</td>
                                    <td>{{ $prorrogacao->situacao }}</td>
                                    <td>{{ $prorrogacao->data_resposta }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <button id="modal" class="btn btn-primary mt-4" onclick="solicitacao_1()"
                            type="submit">Solicitar Prorrogação</button>
                    </div>
                @endif
            </div>
        </div>

        <div id="myModal1" name="id" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Prorrogação</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" action="{{ route('criar-prorrogacao', $manifestacao->id) }}"
                            method="POST">
                            <p>Justifique a prorrogação dessa manifestação:</p>
                            <textarea name="motivo_solicitacao" class="mb-3 form-control" name="mensagem" placeholder="Mensagem*"
                                id="descricao" rows="5"></textarea>
                            {{ csrf_field() }}
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" onclick="close_modal()">Solicitar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal2" name="id" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Compartilhamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" action="{{ route('compartilhar-manifestacao', $manifestacao->id) }}"
                            method="POST">
                            <p class="mb-1 text-center">Compartilhe a manifestação com a secretaria desejada</p>
                            <label for="">Secretaria:</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="secretaria_id">
                                <option value="">Selecione</option>
                                @foreach ($secretarias as $secretaria)
                                    <option value="{{ $secretaria->id }}">
                                        {{ $secretaria->sigla . ' - ' . $secretaria->nome }}
                                    </option>
                                @endforeach
                            </select>
                            <label class="mt-3 mb-1">Justificativa:</label>
                            <textarea class="mb-3 form-control" name="texto_compartilhamento" placeholder="Mensagem*" rows="5"></textarea>
                            {{ csrf_field() }}
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"
                                    onclick="close_modal()">Compartilhar</button>
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
        function recurso(id) {
            $('#recurso-' + id).modal('show');
        }

        function close_modal() {
            $('#myModal').modal('hide');
        }

        function solicitacao_1() {
            $('#myModal1').modal('show');
        }

        function close_modal() {
            $('#myModal1').modal('hide');
        }

        function compartilhar() {
            $('#myModal2').modal('show');
        }

        function close_modal() {
            $('myModal2').modal('hide');
        }
    </script>
@endsection
