@extends('painel.templates.template-admin')
@section('content-admin')
<div id="cadastro">
    <div class="col-md-12">
        <div class="title-content">
            <h1 class="left">Categoria: {{$category->name}}</h1>
            <a href="{{ route( 'admin.categories' ) }}" class="btn btn-default right">
                Voltar
            </a>
        </div>
    </div>
    <form method="GET" action="/admin/category/update/{{$category->id}}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-4">
                <span>Nome Categoria</span>
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
                <span>Descrição</span>
                <textarea id="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ $category->description }}</textarea>

                @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Atualizar
                </button>
            </div>
        </div>
    </form>

</div>
@endsection