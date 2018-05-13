@extends('painel.templates.template-admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Categoria: {{$category->name}}</h1>
    <form method="GET" action="/admin/category/update/{{$category->id}}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-4">
                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$category->name}}" name="name" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <input id="description" type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $category->description }}" required>

                @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-default">
                    Editar
                </button>
            </div>
        </div>
    </form>

</div>
@endsection