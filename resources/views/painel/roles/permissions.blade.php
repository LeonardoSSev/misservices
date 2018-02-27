@extends('templates.temp')
@include('painel.templates.menu-admin')

<main class="painel container">
    <h1>Permissões <-> Papel: {{ $role->name }}</h1>
    <table class="table">
        <thead>
            <th>Nome</th>
            <th>Descrição</th>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <div class="loading"></div>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>

@include('templates.sections.footer')