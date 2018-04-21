@extends('painel.admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Visualizar Categoria: {{$category->name}}</h1>
    <form method="GET" action="/admin/category/update/{{$category->id}}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input id="name" type="text" class="box box-desk radius" value="{{$category->name}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="description" type="text" class="box box-desk radius" value="{{ $category->description }}" disabled>
            </div>
        </div>

    </form>

</div>
@endsection