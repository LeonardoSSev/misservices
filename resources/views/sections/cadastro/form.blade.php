

<div id="cadastro" class="container" ng-app="cadastro">
        <h1>Cadastre-se</h1>
            <form ng-controller="CadastroCtrl">
            
                <input type="text" placeholder="Nome" class="box box-desk radius" name="nome" id="nome" ng-model="cadastro.nome" >
                    <!-- <div class="alert alert-danger">É necessário inserir seu nome</div> -->

                <input type="email" placeholder="E-mail" class="box box-desk radius" name="email" id="email" ng-model="cadastro.email" >
                    <!-- <div class="alert alert-danger" >E-mail inválido</div> -->

                <input type="text" placeholder="CPF" class="box box-desk radius" name="cpf" id="cpf" ng-model="cadastro.cpf" >
                    <!-- <div class="alert alert-danger" >CPF inválido</div> -->

                <input type="text" placeholder="CEP" class="box box-desk radius" name="cep" id="cep" ng-model="cadastro.cep" >
                    <!--div class="alert alert-danger" *ngIf="!cep.valid && cep.touched">Selecione corretamente</div-->
                <select name="uf" id="UF" class="box box-desk radius" ng-model="cadastro.uf" ng-options="estado.sigla for estado in estados">
                    <option value="">Selecione o seu estado</option>
                </select>
                <input type="text" placeholder="Cidade" class="box box-desk radius" name="cidade" id="cidade" ng-model="cadastro.cidade" >
                <input type="text" placeholder="Bairro" class="box box-desk radius" name="bairro" id="bairro" ng-model="cadastro.bairro" >
                <input type="text" placeholder="Endereço" class="box box-desk radius" name="endereco" id="endereco" ng-model="cadastro.enderco" >
                <input type="password" placeholder="Senha para seu perfil" class="box box-desk radius" name="password" ng-model="cadastro.password" id="senha" >
                <!--input type="password" placeholder="Digite sua senha" class="" name="senha2" nModel id="senha2"-->
                <div class="">
                    <label class="">
                    <input type="checkbox" class="" ng-model="cadastro.check" name="idUserType" id="idUserType">Desejo ser um profissional
                    </label>
                </div>
                <select name="servico" id="servico" class="box box-desk radius" >
                    <option value="1">Serviço 1</option>
                    <option value="2">Serviço 2</option>
                    <option value="3">Serviço 3</option>
                </select>
                <button class="btn btn-desk radius bg-white" ng-click="cadastrar(cadastro)" ng-disabled="true">Cadastrar</button>
                
            </form>
        </div>