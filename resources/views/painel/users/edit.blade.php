@extends('painel.templates.template-admin')
@section('content-admin')
<div id="cadastro">
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
    <div class="col-md-8">
        <div class="title-content">
            <h1 class="left">Editar {{ $user->name }}</h1>
            <a href="{{ route( 'admin.users' ) }}" class="btn btn-default right">
                Voltar
            </a>
        </div>
    </div>
    <form method="POST" action="{{route('admin.user.update', $user->id)}}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" name="name" value="{{ $user->name }}" required>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="email" placeholder="E-mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="cpf" type="text" placeholder="CPF (Sem traços e pontos)"  class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ $user->cpf }}" required>

                @if ($errors->has('cpf'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('cpf') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="state" type="text" placeholder="UF" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ $user->state }}" required>

                @if ($errors->has('state'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="city" type="text" placeholder="Cidade" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $user->city }}" required>

                @if ($errors->has('city'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="zipcode" type="text" placeholder="CEP (Sem traços e pontos)" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{ $user->zipcode }}" required>

                @if ($errors->has('zipcode'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('zipcode') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="neighbourhood" type="text" placeholder="Bairro" class="form-control{{ $errors->has('neighbourhood') ? ' is-invalid' : '' }}" name="neighbourhood" value="{{ $user->neighbourhood }}" required>

                @if ($errors->has('neighbourhood'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('neighbourhood') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="address" type="text" placeholder="Endereço" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user->address }}" required>

                @if ($errors->has('address'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="role" class="form-control" name="role" required>
                    @foreach( $roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-right btn-primary ">
                    Atualizar Usuário
                </button>
            </div>
        </div>
    </form>
    <form action="{{route('admin.user.password.update', $user->id)}}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input id="password" type="password" placeholder="Senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="password_confirmation" type="password" placeholder="Repita a senha" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-right btn-primary ">
                    Atualizar Senha
                </button>
            </div>
        </div>
    </form>
</div>
@endsection