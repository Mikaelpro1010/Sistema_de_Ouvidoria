@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mx-5 row col-6 position-absolute top-50 start-50 translate-middle">
            <div class="card shadow">
                <h3 class=" mt-3 text-center">Registrar Usuário</h3>
                <div class="mx-5 card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="mt-3 col-md-4 control-label">Nome:</label>

                            <div class="row align-items-start">
                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="mt-3 col-md-4 control-label">Endereço de E-mail:</label>

                            <div class="row align-items-start">
                                <div class="col-md-10">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="mt-3 col-md-4 control-label">Senha:</label>
                            <div class="row align-items-start">
                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col align-self-center">
                                    <div id="imgEye" >
                                        <i class="fa-sharp fa-solid fa-eye" onclick="exibirSenha()"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="mt-3 col-md-4 control-label">Confirmar Senha:</label>

                            <div class="row align-items-start">
                                <div class="col-md-10">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mt-3 col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        const input = document.getElementById("password")

        function exibirSenha(visualizar){
            if(visualizar){
                input.setAttribute("type", "text");
                $("#imgEye").html(`<i class="fa-sharp fa-solid fa-eye-slash" onclick="javascript:exibirSenha(false)"></i>`);
                
            } else{
                input.setAttribute("type", "password");
                $("#imgEye").html(`<i class="fa-sharp fa-solid fa-eye" onclick="javascript:exibirSenha(true)"></i>`);
            }
        }
    </script>
@endsection
