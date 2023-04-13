@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Formulário de Manifestação</h3>
        </div>
        <div class="card-body p-4 shadow">
            <form class="row" action="{{route('cadastrar-manifestacao')}}" method="POST">
                {{csrf_field()}}
                <label class="mb-1 mt-3" for="">Nome:</label>
                <div class="col-10">
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control">
                </div>

                {{-- <div class="mb-1 col-2">
                    <form>
                        <div class="form-group">
                          <label for="exampleFormControlFile1"></label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </form>
                </div> --}}

                <div class="col-2">
                    <p class="mb-1">Anônimo?*</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="anonimo" id="select_sim" value="1">
                        <label class="form-check-label" for="select_sim">
                            Sim
                        </label>
                    </div>
                    <div class="mb-2 form-check">
                        <input class="form-check-input" type="radio" name="anonimo" id="select_nao" value="0" checked>
                        <label class="form-check-label" for="select_nao">
                            Não
                        </label>
                    </div>
                </div>

                <div class="col-5">
                    <label class="" for="">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" class="form-control">
                </div>

                <div class="col-5">
                    <label for="">Número:</label>
                    <input type="text" name="numero_telefone" id="numero" placeholder="(XX) XXXXXXXXX" class="form-control">
                </div>

                <div class="col-2">
                    <p class="mb-1">Tipo de telefone?*</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tel" value="1" id="tipoCel" checked>
                        <label class="form-check-label" for="tipoCel">
                            Cel
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tel" value="2" id="tipoFixo">
                        <label class="form-check-label" for="tipoFixo">
                            Fixo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tel" value="3" id="tipoWhats">
                        <label class="form-check-label" for="tipoWhats">
                            Whatsapp
                        </label>
                    </div>
                </div>

                <div class="col-4">
                    <label class="mb-1 mt-3" for="">Endereço:</label>
                    <input type="text" name="endereco" id="endereco" placeholder="Endereço" class="form-control">
                </div>

                <div class="col-4">
                    <label class="mb-1 mt-3" for="">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="form-control">
                </div>

                <div class="col-4">
                    <label class="mb-1 mt-3" for="">Tipo de assunto:</label>
                    <select class="form-select" name="tipo_manifestacao">
                        <option value="">Tipo de assunto</option>
                            @foreach($tipos_manifestacao as $tipo_manifestacao)
                                <option name="tipo_manifestacao" value="{{$tipo_manifestacao->id}}">{{$tipo_manifestacao->nome}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label class="mb-1 mt-3" for="">Descrição:</label>
                    <textarea class="form-control" name="manifestacao" placeholder="Mensagem*" id="descricao" rows="5"></textarea>
                </div>

                <div class="mt-3 form-group">
                    <input class="form-control" type="file" id="formFile">
                </div>

                <div class="mb-1 mt-3 mb-3">
                    <div class="form-check">
                        <input for= "checkbox" name="checkbox" id="checkbox" required="required" class="form-check-input" type="checkbox" value=""
                            aria-label="Checkbox for following text input">

                        <label for="checkbox" class="form-check-label">Declaro que as informações acima são verdadeiras e estou ciente de estar sujeito às penas da legislação pertinente caso tenha afirmado falsamente os dados preenchidos.</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-4" type="submit">Enviar Manifestação</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#numero').mask('(00) 00000-0000')
        });
    </script>
@endsection
