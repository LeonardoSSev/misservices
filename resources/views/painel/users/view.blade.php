@extends('painel.templates.template-admin')
@section('content-admin')
<div id="cadastro">
    <div class="col-md-8">
        <div class="title-content">
            <h1 class="left">Visualizar {{ $user->name }}</h1>
            <a href="{{ route( 'admin.users' ) }}" class="btn btn-default right">
                Voltar
            </a>
        </div>
    </div>
    <div class="form-view">
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
</div>
@endsection