<!-- MENU ADMIN-->
<div ng-app="crudAdmin">
        @include('sections.admin.menu-admin')
    <main class="painel container">
        <h1>Painel de Administração</h1>
        <input type="text" class="box box-desk radius" ng-model="busca" placeholder="Pesquise um usuário..." name="pesquisar" ng-model="user.pesquisar">
        <div ng-view></div>
        <table class="table">            
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <tr ng-repeat="user in users | filter:{nome: busca} | orderBy:'-id'" onload="hideLoader()">
                <div class="loading"></div>
                <td>@{{ user.id }}</td>
                <td>@{{ user.nome }}</td>
                <td>@{{ user.email }}</td>
                <td><a href="#/create"><i class="fa fa-lg fa-pencil"></i></a> <a href=""><i class="fa fa-lg fa-times"></i></td></a>
            </tr>
        </table>
    </main>
</div>