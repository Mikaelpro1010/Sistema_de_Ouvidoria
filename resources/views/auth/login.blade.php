@extends('layouts.app')

@section('content')
    @if (session('mensagem'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagem') }}
        </div>
    @endif
    <div class="col-6 position-absolute top-50 start-50 translate-middle card-body border shadow">
        <div class="text-center">
            <img src="{{ asset('img/login_recorte.png') }}" class="rounded-circle"  width="150">
        </div>
        <form class="mx-5 form-horizontal p-2" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Endereço de E-mail:</label>
                <div class="row align-items-start">
                    <div class="col-md-10">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div>
                    <label for="password" class="col-md-4 control-label">Senha:</label>
                </div>
                <div class="row align-items-start">
                    <div class="col-md-10 align-self-start">
                        <input id="password" type="password" class="form-control" name="password" required>
                        
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col align-self-center" id="imgEye">
                        <i class="fa-sharp fa-solid fa-eye" onclick="exibirSenha()"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembre-me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="mt-3 col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Esqueceu sua senha?
                    </a>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        const input = document.getElementById("password")
        const eye = document.getElementById("eyeSvg")

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
