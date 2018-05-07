@extends('painel.templates.template-admin')
@section('content-admin')
<div class="container" id="cadastro">

    <form method="GET" action="/admin/permission/update/{{ $permission->id }}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-4">
                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $permission->name }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <input id="description" type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $permission->description}}" required>

                @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <select id="role" class="form-control " name="role" required>
                    @foreach( $roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
                <button type="submit" class="btn btn-default">
                    Editar
                </button>
            </div>
        </div>
    </form>
</div>
@endsection