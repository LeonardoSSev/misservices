@extends('templates.temp')
<!-- MENU ADMIN-->
<div>
    @include('painel.templates.menu-admin')
    <main class="painel container">
        <h1>Painel de Administração</h1>
        <a href="{{route('admin.permission.create')}}">Adicionar</a>
        <input type="text" class="box box-desk radius" placeholder="Pesquise uma permissão..." name="pesquisar">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <div class="loading"></div>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>
                            <a href="{{route('admin.permission.edit', $permission->id)}}"><i class="fa fa-lg fa-pencil" title="Editar {{ $permission->name }}"></i></a>
                            <a href="{{route('admin.permission.delete', $permission->id)}}"><i class="fa fa-lg fa-times" title="Excluir {{ $permission->name }}"></i></a>
                            <a href="{{route('admin.permission.view', $permission->id)}}"><i class="fa fa-lg fa-eye" title="Visualizar {{ $permission->name }}"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $permissions->links() !!}
    </main>
</div>

@include('templates.sections.footer')