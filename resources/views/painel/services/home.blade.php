@extends('templates.temp')
<!-- MENU ADMIN-->
<div>
    @include('painel.templates.menu-admin')
    <main class="painel container">
        <h1>Painel de Administração</h1>
        <a href="/admin/service/create">Adicionar</a>
        <input type="text" class="box box-desk radius" placeholder="Pesquise um serviço..." name="pesquisar">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Descrição</th>
            <th width="150px">Ações</th>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <div class="loading"></div>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->user->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>
                        <a href="/admin/service/edit/{{ $service->id }}"><i class="fa fa-lg fa-pencil" title="Editar {{ $service->name }}"></i></a>
                        <a href="/admin/service/delete/{{ $service->id }}"><i class="fa fa-lg fa-times" title="Excluir {{ $service->name }}"></i></a>
                        <a href="/admin/service/view/{{ $service->id }}"><i class="fa fa-lg fa-eye" title="Visualizar {{ $service->name }}"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
</div>

@include('templates.sections.footer')