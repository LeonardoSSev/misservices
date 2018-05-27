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
    <div class="col-md-10">
        <div class="title-content">
            <h1 class="left">Editar Telefone</h1>
            <a href="{{ route( 'admin.phones' ) }}" class="btn btn-default right">
                Voltar
            </a>
        </div>
    </div>
    <form method="POST" action="{{route('admin.phone.update', $phone->id) }}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input id="ddd" type="text" class="form-control{{ $errors->has('ddd') ? ' is-invalid' : '' }}" name="ddd" value="{{ $phone->ddd }}" maxlength="2"required autofocus>

                @if ($errors->has('ddd'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('ddd') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ $phone->name }}" maxlength="10" required autofocus>

                @if ($errors->has('number'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('number') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="phone_type" class="form-control" name="phone_type" value="{{ $phone->phoneType->id }}" required>
                    @foreach( $phone_types as $phone_type)
                        <option value="{{ $phone_type->id }}">{{ $phone_type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="user" class="form-control" name="user" required>
                    @foreach( $users as $user)
                        <option value="{{ $user->id }}">{{ $user->number }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-default ">
                    Editar
                </button>
            </div>
        </div>
    </form>
</div>
@endsection