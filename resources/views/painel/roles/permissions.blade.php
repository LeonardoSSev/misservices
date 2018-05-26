@extends('painel.templates.template-admin')
@section('content-admin')
<main class="painel">
    <div class="col-md-12">
        <div class="title-content">
            <h1 class="left">Permissões <-> Papel: {{ $role->name }}</h1>
            <a href="{{ route( 'admin.roles' ) }}" class="btn btn-default right">
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
@endsection