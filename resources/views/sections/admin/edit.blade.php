@extends('template.temp')
@include('sections.admin.menu-admin')
<div class="edit-admin" ng-app="crudAdmin">
    <form name="editUserForm" ng-controller="EditUserCtrl">
    
        <input type="text" placeholder="Nome" class="box box-desk radius" name="nome" id="nome" ng-model="cadastro.nome" ng-required="true">
            <div ng-if="editUserForm.nome.$invalid && editUserForm.nome.$dirty" class="alert alert-danger radius">É necessário inserir seu nome</div> 

        <input type="email" placeholder="E-mail" class="box box-desk radius" name="email" id="email" ng-model="cadastro.email" ng-required="true">
            <div ng-if="editUserForm.email.$invalid && editUserForm.email.$dirty" class="alert alert-danger radius" >E-mail inválido</div>

        <input type="text" placeholder="CPF" class="box box-desk radius" name="cpf" id="cpf" 
        ng-model="cadastro.cpf" 
        ng-required="true"
        >
            <div ng-if="editUserForm.cpf.$invalid && editUserForm.cpf.$dirty" class="alert alert-danger radius" >CPF inválido</div>

        <input type="text" placeholder="CEP" class="box box-desk radius" name="cep" id="cep" 
        ng-model="cadastro.cep" 
        ng-required="true"
        >
            <div ng-if="editUserForm.cep.$invalid && editUserForm.cep.$dirty" class="alert alert-danger radius">Selecione corretamente</div>
        <select name="uf" id="UF" class="box box-desk radius" ng-model="cadastro.uf" ng-options="estado.sigla for estado in estados">
            <option value="">Selecione o seu estado</option>
        </select>
        <input type="text" placeholder="Cidade" class="box box-desk radius" name="cidade" id="cidade" ng-model="cadastro.cidade" >
        <input type="text" placeholder="Bairro" class="box box-desk radius" name="bairro" id="bairro" ng-model="cadastro.bairro" >
        <input type="text" placeholder="Endereço" class="box box-desk radius" name="endereco" id="endereco" ng-model="cadastro.enderco" >
        <input type="password" placeholder="Senha para seu perfil" class="box box-desk radius" name="password" ng-model="cadastro.password" id="senha" >        
        <div class="">
            <label class="">
                <input type="checkbox" class="" 
                ng-click="isCheck()" 
                ng-model="cadastro.check" name="idUserType" id="idUserType">
                Desejo ser um profissional
            </label>
        </div>
        <select ng-if="checagem == true" name="servico" id="servico" class="box box-desk radius" >
            <option value="1">Serviço 1</option>
            <option value="2">Serviço 2</option>
            <option value="3">Serviço 3</option>
        </select>
        <button class="btn btn-desk radius bg-white" >Atualizar</button>
        
    </form>
</div>