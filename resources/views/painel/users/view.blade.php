@extends('painel.admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Visualizar {{ $user->name }}</h1>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="name" type="text" class="box box-desk radius" value="{{ $user->name }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="email" type="email" class="box box-desk radius" value="{{ $user->email }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="cpf" type="text" class="box box-desk radius" value="{{ $user->cpf }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="state" type="text" class="box box-desk radius" value="{{ $user->state }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="city" type="text" class="box box-desk radius" value="{{ $user->city }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="zipcode" type="text" class="box box-desk radius" value="{{ $user->zipcode }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="neighbourhood" type="text" class="box box-desk radius" value="{{ $user->neighbourhood }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="address" type="text" class="box box-desk radius" value="{{ $user->address }}" disabled>
            </div>
        </div>

</div>
@endsection