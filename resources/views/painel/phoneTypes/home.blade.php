@extends('templates.temp')
<!-- MENU ADMIN-->
<div>
    @include('painel.templates.menu-admin')
    <main class="painel container">
        <h1>Painel de Administração</h1>
        <a href="{{ route('admin.phone_type.create') }}">Adicionar</a>
        <input type="text" class="box box-desk radius" placeholder="Pesquise um tipo de telefone..." name="pesquisar">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                @foreach($phoneTypes as $phone_type)
                    <tr>
                        <div class="loading"></div>
                        <td>{{ $phone_type->id }}</td>
                        <td>{{ $phone_type->name }}</td>
                        <td>{{ $phone_type->description }}</td>
                        <td>
                            <!--a href="{{ route('admin.phone_type.phones', $phone_type->id) }}/admin/phone_type/phones/{{ $phone_type->id }}"><i class="fa fa-lg fa-phone" title="Visualizar tipos de telefone que são {{ $phone_type->name }}"></i></a-->
                            <a href="{{ route('admin.phone_type.edit', $phone_type->id) }}"><i class="fa fa-lg fa-pencil" title="Editar {{ $phone_type->name }}"></i></a>
                            <a href="{{ route('admin.phone_type.delete', $phone_type->id) }}"><i class="fa fa-lg fa-times" title="Excluir {{ $phone_type->name }}"></i></a>
                            <a href="{{ route('admin.phone_type.view', $phone_type->id) }}"><i class="fa fa-lg fa-eye" title="Visualizar {{ $phone_type->name }}"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $phoneTypes->links() !!}
    </main>
</div>

@include('templates.sections.footer')