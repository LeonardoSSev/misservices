@extends('painel.templates.template-admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Visualizar Categoria: {{$category->name}}</h1>
    <form method="GET" action="/admin/category/update/{{$category->id}}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-4">
                <input id="name" type="text" class="form-control" value="{{$category->name}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <input id="description" type="text" class="form-control" value="{{ $category->description }}" disabled>
            </div>
        </div>

    </form>

</div>
@endsection