@extends('painel.templates.template-admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Criar categoria</h1>
    <form method="POST" action="/admin/category/store" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-4">
                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <input id="description" placeholder="Descrição" type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required>

                @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6">
                <button type="submit" class="btn btn-default">
                    Criar
                </button>
            </div>
        </div>
    </form>

</div>
@endsection