@extends('painel.admin')
@section('content-admin')
<div class="container" id="cadastro">

    <form method="GET" action="/admin/phone/update/{{ $phone->id }}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input id="number" type="text" class="box box-desk radius{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ $phone->name }}" required autofocus>

                @if ($errors->has('number'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('number') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="phone_type" class="box box-desk radius" name="phone_type" value="{{ $phone->phoneType->id }}" required>
                    @foreach( $phone_types as $phone_type)
                        <option value="{{ $phone_type->id }}">{{ $phone_type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="user" class="box box-desk radius" name="user" required>
                    @foreach( $users as $user)
                        <option value="{{ $user->id }}">{{ $user->number }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-desk radius bg-white">
                    Editar
                </button>
            </div>
        </div>
    </form>
</div>
@endsection