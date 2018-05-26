@extends('painel.templates.template-admin')
@section('content-admin')
<div id="cadastro">
    <h1>Visualizar {{ $user->name }}</h1>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="name" type="text" class="form-control" value="{{ $user->name }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="cpf" type="text" class="form-control" value="{{ $user->cpf }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="state" type="text" class="form-control" value="{{ $user->state }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="city" type="text" class="form-control" value="{{ $user->city }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="zipcode" type="text" class="form-control" value="{{ $user->zipcode }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="neighbourhood" type="text" class="form-control" value="{{ $user->neighbourhood }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="address" type="text" class="form-control" value="{{ $user->address }}" disabled>
            </div>
        </div>

</div>
@endsection