@extends('painel.templates.template-admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Visualizar {{ $role->name }}</h1>
    <div class="form-group row">
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" value="{{ $role->name }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <input id="description" type="text" class="form-control" value="{{ $role->description }}" disabled>
        </div>
    </div>
</div>

@endsection