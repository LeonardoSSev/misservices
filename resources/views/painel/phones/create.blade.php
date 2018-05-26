@extends('painel.templates.template-admin')
@section('content-admin')
<div id="cadastro">

    <form method="POST" action="/admin/phone/store" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
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
                <select id="phone_type" class="form-control" name="phone_type" required>
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
                    Criar
                </button>
            </div>
        </div>
    </form>
</div>
@endsection