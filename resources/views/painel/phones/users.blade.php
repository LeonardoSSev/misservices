@extends('templates.temp')
@include('painel.templates.menu-admin')

<main class="painel container">
    <h1>Usuários <-> Papel: {{ $phone->Number }}</h1>
    <table class="table">
        <thead>
            <th>Nome</th>
            <th>E-mail</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <div class="loading"></div>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>

@include('templates.sections.footer')