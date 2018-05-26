@extends('painel.templates.template-admin')
@section('content-admin')
<div id="cadastro">
    <div class="col-md-10">
        <div class="title-content">
            <h1 class="left">Criar Permissão</h1>
            <a href="{{ route( 'admin.phones' ) }}" class="btn btn-default right">
                Voltar
            </a>
        </div>
    </div>
    <form method="POST" action="/admin/phone/store" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <span>DDD</span>
                <input id="ddd" type="text" class="form-control{{ $errors->has('ddd') ? ' is-invalid' : '' }}" placeholder="DDD" name="ddd" value="{{ old('ddd') }}" required autofocus>

                @if ($errors->has('number'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('number') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6">
                <span>Número Telefone</span>
                <input id="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="Telefone" name="number" value="{{ old('number') }}" required>

                @if ($errors->has('number'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('number') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <span>Tipo Telefone</span>
                <select id="phone_type" class="form-control" name="phone_type" required>
                    <option value="">Selecione um tipo</option>
                    @foreach( $phone_types as $phone_type)
                        <option value="{{ $phone_type->id }}">{{ $phone_type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <span>Usuário</span>
                <select id="user" class="form-control" name="user" required>
                    @foreach( $users as $user)
                        <option value="{{ $user->id }}">{{ $user->number }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </div>
    </form>
</div>
@endsection