@extends('templates.temp')
<!-- MENU ADMIN-->
<div>
    @include('painel.templates.menu-admin')
    <main class="painel container">
        <h1>Painel de Administração</h1>
        <a href="{{route('admin.category.create')}}">Adicionar</a>
        <input type="text" class="box box-desk radius" placeholder="Pesquise uma categoria..." name="pesquisar">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <div class="loading"></div>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{route('admin.category.edit', $category->id)}}"><i class="fa fa-lg fa-pencil" title="Editar {{ $category->name }}"></i></a>
                            <a href="{{route('admin.category.delete', $category->id)}}"><i class="fa fa-lg fa-times" title="Excluir {{ $category->name }}"></i></a>
                            <a href="{{route('admin.category.view', $category->id)}}"><i class="fa fa-lg fa-eye" title="Visualizar {{ $category->name }}"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $categories->links() !!}
    </main>
</div>

@include('templates.sections.footer')