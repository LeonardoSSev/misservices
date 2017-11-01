<!-- MENU ADMIN-->
<div ng-app="crudAdmin">
        @include('sections.admin.menu-admin')
    <main class="painel container" ng-controller="CrudCtrl">
        <h1>Painel de Administração</h1>
        <input type="text" class="box box-desk radius" placeholder="Pesquise um usuário..." name="pesquisar" ng-model="user.pesquisar">
        <table class="table">
            
            <th>Nome</th>
            <th>E-mail</th>
            <th>CPF</th>
            <tr ng-repeat="user in users">
                <td>@{{ user.nome }}</td>
                <td>@{{ user.email }}  </td>
                <td>@{{ user.cpf }} </td>
                <td><a href=""><i class="fa fa-lg fa-pencil"></i></a> <a href=""><i class="fa fa-lg fa-times"></i></td></a>
            </tr>
        </table>
    </main>
</div>