@extends('painel.templates.template-admin')
@section('content-admin')
<main class="painel">
    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="col-md-10">
        <div class="title-content">
            <h1>Usuários <-> Papel: {{ $phone->Number }}</h1>
            <a href="{{ route( 'admin.phones' ) }}" class="btn btn-default right">
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