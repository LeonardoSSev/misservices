@extends('painel.templates.template-admin')
@section('content-admin')
<main class="painel">
    <div class="col-md-12">
        <div class="title-content">
            <h1 class="left">Papéis <-> Usuário: {{ $user->name }}</h1>
            <a href="{{ route( 'admin.users' ) }}" class="btn btn-default right">
                Voltar
            </a>
        </div>
    </div>
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