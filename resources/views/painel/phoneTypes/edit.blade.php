@extends('painel.templates.template-admin')
@section('content-admin')
<div class="container" id="cadastro">

    <form method="GET" action="/admin/phone_type/update/{{ $phoneType->id }}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $phoneType->name }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $phoneType->description}}" required>

                @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
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