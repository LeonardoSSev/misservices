@extends('template.temp')
@include('sections.admin.menu-admin')
<div class="edit-admin" ng-app="crudAdmin">

    <form name="editUserForm" ng-controller="EditUserCtrl" method="post" action="/admin/update/{{ $result->id }}">
        <input type="text" placeholder="Nome" value="{{ $result->nome }}" class="form-control" name="nome" id="nome"  ng-required="true">
            <div ng-if="editUserForm.nome.$invalid && editUserForm.nome.$dirty" class="alert alert-danger radius">É necessário inserir seu nome</div> 

        <input type="email" placeholder="E-mail" value="{{ $result->email }}" class="form-control" name="email" id="email"  ng-required="true">
            <div ng-if="editUserForm.email.$invalid && editUserForm.email.$dirty" class="alert alert-danger radius" >E-mail inválido</div>

        <input type="text" placeholder="CPF" value="{{ $result->cpf }}" class="form-control" name="cpf" id="cpf" ng-required="true">
            <div ng-if="editUserForm.cpf.$invalid && editUserForm.cpf.$dirty" class="alert alert-danger radius" >CPF inválido</div>
        <input type="tel" name="telefone" id="telefone" placeholder="Telefone" class="form-control">
        <input type="text" placeholder="CEP" value="{{ $result->cep }}" class="form-control" name="cep" id="cep" ng-required="true">
            <div ng-if="editUserForm.cep.$invalid && editUserForm.cep.$dirty" class="alert alert-danger radius">Selecione corretamente</div>
        <input type="text" placeholder="UF" value="{{ $result->uf }}" class="form-control" name="uf" id="uf">
        <input type="text" value="{{ $result->cidade }}" placeholder="Cidade" class="form-control" name="cidade" id="cidade"  >
        <input type="text" value="{{ $result->bairro }}" placeholder="Bairro" class="form-control" name="bairro" id="bairro"  >
        <input type="text" value="{{ $result->endereco }}" placeholder="Endereço" class="form-control" name="endereco" id="endereco"  >
        <input type="text" value="" placeholder="Serviço" class="form-control" name="servico">

        <button class="btn btn-default " >Atualizar</button>
        
    </form>
</div>