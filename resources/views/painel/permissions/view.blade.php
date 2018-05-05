@extends('painel.templates.template-admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Visualizar {{ $permission->name }}</h1>
    <div class="form-group row">
        <div class="col-md-4">
            <input id="name" type="text" class="form-control" value="{{ $permission->name }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            <input id="description" type="text" class="form-control" value="{{ $permission->description}}" disabled>

        </div>
    </div>
</div>
@endsection