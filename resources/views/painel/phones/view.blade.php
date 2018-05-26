@extends('painel.templates.template-admin')
@section('content-admin')
<div id="cadastro">
    <h1>Visualizar {{ $phone->name }}</h1>
    <div class="form-group row">
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" value="{{ $phone->number }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <input id="description" type="text" class="form-control" value="{{ $phone->phoneType->name }}" disabled>
        </div>
    </div>

</div>

@endsection