@extends('templates.temp')
<!-- MENU ADMIN-->
<div>
    @include('painel.templates.menu-admin')
    <main class="painel container">
        <h1>Painel de Administração</h1>
        <a href="/admin/role/create">Adicionar</a>
        <input type="text" class="box box-desk radius" placeholder="Pesquise um papel..." name="pesquisar">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <div class="loading"></div>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <a href="/admin/role/users/{{ $role->id }}"><i class="fa fa-lg fa-user" title="Usuários que são {{ $role->name }}"></i></a>
                            <a href="/admin/role/permissions/{{ $role->id }}"><i class="fa fa-lg fa-unlock" title="Permissões de {{ $role->name }}"></i></a>
                            <a href="/admin/role/edit/{{ $role->id }}"><i class="fa fa-lg fa-pencil" title="Editar {{ $role->name }}"></i></a>
                            <a href="/admin/role/delete/{{ $role->id }}"><i class="fa fa-lg fa-times" title="Excluir {{ $role->name }}"></i></a>
                            <a href="/admin/role/view/{{ $role->id }}"><i class="fa fa-lg fa-eye" title="Visualizar {{ $role->name }}"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</div>

@include('templates.sections.footer')