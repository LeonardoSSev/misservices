@extends('painel.admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Cadastrar</h1>
    <form method="POST" action="/admin/user/store" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input id="name" type="text" class="box box-desk radius{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="email" placeholder="E-mail" type="email" class="box box-desk radius{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="cpf" type="text" placeholder="CPF (Sem traços e pontos)"  class="box box-desk radius{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" required>

                @if ($errors->has('cpf'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('cpf') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="state" type="text" placeholder="UF" class="box box-desk radius{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}" required>

                @if ($errors->has('state'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="city" type="text" placeholder="Cidade" class="box box-desk radius{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                @if ($errors->has('city'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="zipcode" type="text" placeholder="CEP (Sem traços e pontos)" class="box box-desk radius{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{ old('zipcode') }}" required>

                @if ($errors->has('zipcode'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('zipcode') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="neighbourhood" type="text" placeholder="Bairro" class="box box-desk radius{{ $errors->has('neighbourhood') ? ' is-invalid' : '' }}" name="neighbourhood" value="{{ old('neighbourhood') }}" required>

                @if ($errors->has('neighbourhood'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('neighbourhood') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="address" type="text" placeholder="Endereço" class="box box-desk radius{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                @if ($errors->has('address'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="password" type="password" placeholder="Senha para seu perfil" class="box box-desk radius{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="password-confirm" type="password" placeholder="Repita a senha" class="box box-desk radius" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="role" class="box box-desk radius" name="role" required>
                    @foreach( $roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-desk radius bg-white">
                    Criar
                </button>
            </div>
        </div>
    </form>

</div>
@endsection