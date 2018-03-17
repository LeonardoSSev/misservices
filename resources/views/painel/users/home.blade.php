@extends('templates.temp')
<!-- MENU ADMIN-->
<div>
    @include('painel.templates.menu-admin')
    <main class="painel container">
        <h1>Painel de Administração</h1>
        <a href="/admin/user/create">Adicionar</a>
        <input type="text" class="box box-desk radius" placeholder="Pesquise um usuário..." name="pesquisar">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <div class="loading"></div>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="/admin/user/roles/{{ $user->id }}"><i class="fa fa-lg fa-lock" title="Papéis de {{ $user->name }}"></i></a>
                            <a href="/admin/user/edit/{{ $user->id }}"><i class="fa fa-lg fa-pencil" title="Editar {{ $user->name }}"></i></a>
                            <a href="/admin/user/delete/{{ $user->id }}"><i class="fa fa-lg fa-times" title="Excluir {{ $user->name }}"></i></a>
                            <a href="/admin/user/view/{{ $user->id }}"><i class="fa fa-lg fa-eye" title="Visualizar {{ $user->name }}"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</div>

@include('templates.sections.footer')