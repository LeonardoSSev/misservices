@extends('painel.admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Visualizar {{ $permission->name }}</h1>
    <div class="form-group row">
        <div class="col-md-6">
            <input id="name" type="text" class="box box-desk radius" value="{{ $permission->name }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <input id="description" type="text" class="box box-desk radius" value="{{ $permission->description}}" disabled>

        </div>
    </div>
</div>
@endsection