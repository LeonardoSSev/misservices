@extends('templates.temp')
@section('content')
@include('templates.sections.header')

<div id="login">
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <div class="col-g-12 text-center">
            <h1>Faça seu Login</h1>
            <hr class="star-primary">
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row">
                <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="email">Seu e-mail</label>
                        <input id="email" type="email" placeholder="Seu e-mail" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="password">Sua senha</label>
                        <input id="password" type="password" placeholder="Sua senha" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-lg btn-form">
                            Entrar
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <span class="link">Ainda não tem cadastro? <a href="{{ route('register') }}">Cadastre-se aqui</a></span>
    </div>
</div>

@include('templates.sections.footer')
@stop