@extends('painel.templates.template-admin')
@section('content-admin')

<main class="painel">    
    <div class="col-md-12">
        <div class="title-content">
            <h1 class="left">Usuários <-> Papel: {{ $role->name }}</h1>
            <a href="{{ route( 'admin.roles' ) }}" class="btn btn-default right">
                Voltar
            </a>
        </div>
    </div>
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

@endsection