@extends('layouts.app')

@section('content')
    <div class="p-3 row align-items-start">
        @if (session('mensagem'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagem') }}
        </div>
        @endif
        <div class="border p-3 col-md-6 mb-3">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Boas vindas</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">FAQ</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                    tabindex="0">
                    <a href="{{ route('vis-pagina_manifestacao') }}" class="col-12">
                        <div class="p-3 rounded-2 btn btn-secondary mb-3 col">
                            <h3>Manifeste-se aqui</h3>
                            <div class="row align-items-start">
                                <div class="col-2">
                                    <figure class="figure p-2">
                                        <img src="{{ asset('img/support.jpg') }}" class="figure-img img-fluid rounded" alt="">
                                    </figure>
                                </div>
                                <div class="col-10">
                                    <label for="">Crie um manifestação para registrar uma sugestão, elogio,
                                        solicitação, denúncia, solicitação de informação ou reclamação relativa ao poder
                                        público</label>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="p-4 rounded-2 bg-secondary col">
                        <div class="row align-items-start">
                            <h3 class="d-flex justify-content-center" style="color: white">Acompanhar manifestação ou
                                recurso</h3>
                            <div class="d-flex justify-content-center">
                                <div class="col-2">
                                    <figure class="figure p-2">
                                        <img src="{{ asset('img/pesquisa.jpg') }}" class="figure-img img-fluid rounded" alt="">
                                    </figure>
                                </div>
                                <div class="col-10">
                                    <form action="{{ route('vis-manifestacao') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="d-flex justify-content-evenly row align-items-start">
                                            <div class="col p-3">
                                                <label for="" style="color: white">Protocolo:</label>
                                                <input class="col-12" name="protocolo" type="number">
                                            </div>
                                            <div class="col p-3">
                                                <label for="" style="color: white">Senha:</label>
                                                <input class="col-12" name="senha" type="number">
                                            </div>
                                        </div>
                                            <div class="mt-3 d-flex justify-content-center">
                                                <button class="btn btn-success" type="submit">
                                                    Acompanhar Manifestação
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                    tabindex="0">
                    @if (isset($faqs) && count($faqs) > 0)
                        @foreach ($faqs as $faq)
                            <ul>
                                <li>
                                    <b>
                                        {{ $faq->pergunta }}
                                    </b>
                                    <p>
                                        {{ $faq->resposta }}
                                    </p>
                                </li>
                            </ul>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="6">
                                não existem registros!
                            </td>
                        </tr>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border card-header">
                <p class="d-flex justify-content-center fw-bold">Esse é seu espaço para enviar:</p>
            </div>
            <div class="border card-body">
                <div class="row mt-1 p-2 border">
                    <p>
                        <img src="{{ asset('img/emoji_pensativo.jpg') }}" class="border figure-img img-fluid rounded"
                        alt="60" width="60" height="60">
                    
                        <b class="border-2 border-bottom border-warning">Pedido de informações:</b> Informações sobre serviços públicos, conforme LEI nº12.527;
                    </p>
                </div>

                <div class="row mt-2 border p-2">
                    <p>
                        <img src="{{ asset('img/emoji_ideia.jpg') }}" class="border figure-img img-fluid rounded"
                        alt="60" width="60" height="60">
                    
                        <b class="border-2 border-bottom border-warning">Sugestão:</b> Ideia ou proposta considerada útil à melhoria da gestão;
                    </p>
                </div>

                <div class="row mt-2 border p-2">
                    <p>
                        <img src="{{ asset('img/emoji_elogio1.jpg') }}" class="border figure-img img-fluid rounded"
                        alt="60" width="60" height="60">
                    
                        <b class="border-2 border-bottom border-warning">Elogio:</b> Reconhecimento ou satisfação sobre o serviço recebido;
                    </p>
                </div>
                <div class="row mt-2 border p-2">
                    <p>
                        <img src="{{ asset('img/pedido.png') }}" class="figure-img img-fluid rounded border"
                        alt="40" width="40" height="40">
                    
                        <b class="border-2 border-bottom border-warning">Solicitação:</b> Requerimento de atendimento ou serviço;
                    </p>
                </div>
                <div class="row mt-2 border p-2">
                    <p>
                        <img src="{{ asset('img/emoji_reclamacao.jpg') }}" class="figure-img img-fluid rounded border"
                        alt="50" width="50" height="50">
                    
                        <b class="border-2 border-bottom border-warning">Reclamação:</b> Manifestar desagrado ou protesto sobre um serviço ou de servidor, considerado ineficiente, ineficaz ou não efetivo;
                    </p>
                </div>
                <div class="row mt-2 border p-2">
                    <p>
                        <img src="{{ asset('img/denuncia.jpg') }}" class="figure-img img-fluid rounded"
                        alt="40" width="40" height="40">
                    
                        <b class="border-2 border-bottom border-warning">Denúncia:</b> Comunicar irregularidade ou indício de irregularidade na administração ou no
                        atendimento que venha à ferir a ética e a legislação.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
