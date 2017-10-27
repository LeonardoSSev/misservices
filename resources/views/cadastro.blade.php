<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MisServices</title>

    <body>
    <div id="cadastro">
        <h1>Cadastre-se</h1>
            <form class="">
                <input type="text" placeholder="Nome" class="" name="nome" id="nome" required>
                    <div class="alert alert-danger">É necessário inserir seu nome</div>

                <input type="email" placeholder="E-mail" class="" name="email" id="email" required>
                    <div class="alert alert-danger" >E-mail inválido</div>

                <input type="text" placeholder="CPF" class="" name="cpf" id="cpf" required>
                    <div class="alert alert-danger" >CPF inválido</div>

                <input type="text" placeholder="CEP" class="" name="cep" id="cep" required>
                    <!--div class="alert alert-danger" *ngIf="!cep.valid && cep.touched">Selecione corretamente</div-->
                <select name="uf" id="UF" class="" ngModel required>
                    <option value="">Selecione o seu estado</option>
                    <option value="ES">ES</option>
                    <option value="MG">MG</option>
                    <option value="SP">SP</option>
                    <option value="RJ">RJ</option>
                </select>
                <input type="text" placeholder="Cidade" class="" name="cidade" id="cidade" ngModel required>
                <input type="text" placeholder="Bairro" class="" name="bairro" id="bairro" ngModel required>
                <input type="text" placeholder="Endereço" class="" name="endereco" id="endereco" ngModel required>
                <input type="password" placeholder="Senha para seu perfil" class="" name="password" ngModel id="senha" required>
                <!--input type="password" placeholder="Digite sua senha" class="" name="senha2" ngModel id="senha2"-->
                <div class="">
                    <label class="">
                    <input type="checkbox" class="box form-check-input" ngModel name="idUserType" id="idUserType">
                        Desejo ser um profissional
                    </label>
                </div>
                <select name="servico" id="servico" class="" ngModel>
                    <option value="1">Serviço 1</option>
                    <option value="2">Serviço 2</option>
                    <option value="3">Serviço 3</option>
                </select>
                <button class="">Cadastrar</button>
            </form>
        </div>
    </body>
</html>
