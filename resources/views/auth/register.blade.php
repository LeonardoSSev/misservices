@extends('templates.temp')
@section('content')
@include('templates.sections.header')

<div id="cadastro">
    <div class="container">
        <div class="col-g-12 text-center">
            <h1>Cadastre-se</h1>
            <hr class="star-primary">
        </div>
        <form method="POST" action="{{ route('register') }}" name="cadastroForm">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="name">Nome</label>
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="email">Seu e-mail</label>
                    <input id="email" placeholder="E-mail" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="telephone">Telefone</label>
                    <input id="telephone" type="text" placeholder="Telefone" class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" required>

                    @if ($errors->has('telephone'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('telephone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="cellphone">Celular</label>
                    <input id="cellphone" type="text" placeholder="Celular" class="form-control {{ $errors->has('cellphone') ? ' is-invalid' : '' }}" name="cellphone" value="{{ old('cellphone') }}" required>

                    @if ($errors->has('cellphone'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('cellphone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="cpf">CPF</label>
                    <input id="cpf" type="text" placeholder="CPF (Sem traços e pontos)"  class="form-control {{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" required>

                    @if ($errors->has('cpf'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="zipcode">CEP</label>
                    <input id="zipcode" type="text" placeholder="CEP (Sem traços e pontos)" class="form-control {{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{ old('zipcode') }}" required>

                    @if ($errors->has('zipcode'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('zipcode') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="state">UF</label>
                    <input id="state" type="text" placeholder="UF" class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}" maxlength="2" required>

                    @if ($errors->has('state'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="city">Cidade</label>
                    <input id="city" type="text" placeholder="Cidade" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                    @if ($errors->has('city'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="neighbourhood">Bairro</label>
                    <input id="neighbourhood" type="text" placeholder="Bairro" class="form-control {{ $errors->has('neighbourhood') ? ' is-invalid' : '' }}" name="neighbourhood" value="{{ old('neighbourhood') }}" required>

                    @if ($errors->has('neighbourhood'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('neighbourhood') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="address">Endereço</label>
                    <input id="address" type="text" placeholder="Endereço" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" maxlength="250" required>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="password">Sua senha</label>
                    <input id="password" type="password" placeholder="Sua senha" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group col-xs-12 floating-label-form-group">
                    <label for="passworf-confirm">Confirme a senha</label>
                    <input id="password-confirm" type="password" placeholder="Confirme a senha" class="form-control" name="password_confirmation" required>
                </div>
                <div class="col-md-12">
                    <button type="submit" onclick="removeMasks()" class="btn btn-lg btn-form">
                        Cadastrar
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

@include('templates.sections.footer')
@stop