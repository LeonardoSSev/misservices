@extends('template.temp')
@include('sections.admin.menu-admin')
<div class="edit-admin" ng-app="crudAdmin">

    <form name="editUserForm" ng-controller="EditUserCtrl" action="/admin/update/{{ $result->id }}">
        <input type="text" placeholder="Nome" value="{{ $result->nome }}" class="box box-desk radius" name="nome" id="nome"  ng-required="true">
            <div ng-if="editUserForm.nome.$invalid && editUserForm.nome.$dirty" class="alert alert-danger radius">É necessário inserir seu nome</div> 

        <input type="email" placeholder="E-mail" value="{{ $result->email }}" class="box box-desk radius" name="email" id="email"  ng-required="true">
            <div ng-if="editUserForm.email.$invalid && editUserForm.email.$dirty" class="alert alert-danger radius" >E-mail inválido</div>

        <input type="text" placeholder="CPF" value="{{ $result->cpf }}" class="box box-desk radius" name="cpf" id="cpf" ng-required="true">
            <div ng-if="editUserForm.cpf.$invalid && editUserForm.cpf.$dirty" class="alert alert-danger radius" >CPF inválido</div>
        <input type="tel" name="telefone" id="telefone" placeholder="Telefone" class="box box-desk radius">
        <input type="text" placeholder="CEP" value="{{ $result->cep }}" class="box box-desk radius" name="cep" id="cep" ng-required="true">
            <div ng-if="editUserForm.cep.$invalid && editUserForm.cep.$dirty" class="alert alert-danger radius">Selecione corretamente</div>
        <input type="text" placeholder="UF" value="{{ $result->uf }}" class="box box-desk radius" name="uf" id="uf">
        <input type="text" value="{{ $result->cidade }}" placeholder="Cidade" class="box box-desk radius" name="cidade" id="cidade"  >
        <input type="text" value="{{ $result->bairro }}" placeholder="Bairro" class="box box-desk radius" name="bairro" id="bairro"  >
        <input type="text" value="{{ $result->endereco }}" placeholder="Endereço" class="box box-desk radius" name="endereco" id="endereco"  >
        <input type="text" value="" placeholder="Serviço" class="box box-desk radius" name="servico">

        <button class="btn btn-desk radius bg-white" >Atualizar</button>
        
    </form>
</div>