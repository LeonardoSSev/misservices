@extends('painel.templates.template-admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Visualizar {{ $phoneType->name }}</h1>
    <div class="form-group row">
        <div class="col-md-6">
            <input id="name" type="text" class="box box-desk radius" value="{{ $phoneType->name }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <input id="description" type="text" class="box box-desk radius" value="{{ $phoneType->description }}" disabled>
        </div>
    </div>
</div>
@endsection