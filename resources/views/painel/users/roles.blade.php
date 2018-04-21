@extends('painel.admin')
@section('content-admin')
<main class="painel container">
    <h1>Papéis <-> Usuário: {{ $user->name }}</h1>
    <table class="table">
        <thead>
        <th>Nome</th>
        <th>Descrição</th>

        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <div class="loading"></div>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
@endsection