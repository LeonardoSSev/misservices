@extends('templates.temp')
@include('templates.sections.header')

<div class="container" id="cadastro">
    <h1>Informações pessoais de {{ $user->name }}  <button href="user/{{$user->id}}/edit">Editar</button></h1>
    <ul>
        <a href="#"><li>Meus pedidos</li></a>
        <a href="#"><li>Minhas solicitações</li></a>
        <a href="#"><li>Mensagens</li></a>
        <a href="#"><li>Senha</li></a>
    </ul>

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

@include('templates.sections.footer')