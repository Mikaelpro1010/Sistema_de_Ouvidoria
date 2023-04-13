@extends('layouts.app')

@section('content')
    <div class="accordion mb-3">
        <div class="accordion-item mb-3">
            <h3 class="accordion-header">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Manifestação:
                </button>
            </h3>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row align-items-start p-3">
                        <div class="col">
                            <label class="fw-bold" for="">Nome</label>
                            <p class="border-2 border-bottom border-warning">{{ $manifestacao->nome }}</p>
                        </div>
                        <div class="col">
                            <label class="fw-bold" for="">Tipo de Manifestação</label>
                            <p class="border-2 border-bottom border-warning">{{ $manifestacao->tipoManifestacao->nome }}</p>
                        </div>
                        <div class="col">
                            <label class="fw-bold" for="">Situação:</label>
                            <p class="border-2 border-bottom border-warning">{{ $manifestacao->situacao->nome }}</p>
                        </div>
                        <div class="col">
                            <label class="fw-bold" for="">Data da Manifestação:</label>
                            <p class="border-2 border-bottom border-warning">
                                {{ Carbon\Carbon::parse($manifestacao->updated_at)->format('d/m/Y \à\s H:i\h') }}</p>
                        </div>
                        <label class="fw-bold" for="">Manifestação:</label>
                        <p class="border-2 border-bottom border-warning">{{ $manifestacao->manifestacao }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item mb-3">
            <h3 class="accordion-header">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Resposta:
                </button>
            </h3>
            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <label for="" class="fw-bold">Contextualização:</label>
                    <p class="border-2 border-bottom border-warning">{{ $manifestacao->contextualizacao }}</p>
                    <label for="" class="fw-bold">Providência adotada:</label>
                    <p class="border-2 border-bottom border-warning">{{ $manifestacao->providencia_adotada }}</p>
                    <label for="" class="fw-bold">Conclusão:</label>
                    <p class="border-2 border-bottom border-warning">{{ $manifestacao->conclusao }}</p>
                </div>
            </div>
        </div>
        <div class="accordion-item mb-3">
            <h3 class="accordion-header">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    Recurso:
                </button>
            </h3>
            <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class='p-3 text-center'>
                        <button class="btn btn-primary mt-4" onclick="deletar()" type="submit">Entrar com recurso</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal1" name="id" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informar recurso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" name="recurso" id="recurso" action="{{ route('criar-recurso') }}" method="POST">
                        <p>Digite um texto relacioando ao seu recurso:</p>
                        {{ csrf_field() }}
                        <input type="hidden" name="manifestacao_id" value="{{ $manifestacao->id }}">
                        <textarea class="form-control" name="recurso" id="recurso" rows="5"></textarea>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" onclick="close_modal()">Enviar</button>
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
            // $('#deletar').val(id);
            $('#myModal1').modal('show');
        }

        function close_modal() {
            $('#myModal1').modal('hide');
        }
    </script>
@endsection
