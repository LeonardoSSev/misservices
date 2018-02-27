@extends('templates.temp')
@include('templates.sections.header')
<div class="contato container">
    <form action="">
        <input type="text" placeholder="Nome" class="box box-desk radius" name="nome" id="nome" ng-model="cadastro.nome" >
        <input type="email" placeholder="E-mail" class="box box-desk radius" name="email" id="email" ng-model="cadastro.email" >
        <input type="text" placeholder="E-mail" class="box box-desk radius" name="email" id="assunto" ng-model="assunto.email" >
        <textarea name="mensagem" id="mensagem" cols="30" rows="10" placeholder="Sua Mensagem..." class="box box-desk radius"></textarea>
        <button class="btn btn-desk bg-black radius">Acessar</button>
    </form>
</div>

@include('templates.sections.footer')