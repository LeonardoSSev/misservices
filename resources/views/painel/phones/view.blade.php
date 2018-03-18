@extends('templates.temp')
@include('painel.templates.menu-admin')
<div class="container" id="cadastro">
    <h1>Visualizar {{ $phone->name }}</h1>
    <div class="form-group row">
        <div class="col-md-6">
            <input id="name" type="text" class="box box-desk radius" value="{{ $phone->number }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <input id="description" type="text" class="box box-desk radius" value="{{ $phone->phoneType->name }}" disabled>
        </div>
    </div>

</div>

@include('templates.sections.footer')