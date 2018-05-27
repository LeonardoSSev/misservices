@extends('painel.templates.template-admin')
@section('content-admin')
    <div class="painel">
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
        <h1>Painel de Administração</h1>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Adicionar</a>
        <div class="col-lg-3">
            <input type="text" class="form-control" placeholder="Pesquise um usuário..." name="pesquisar">
        </div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <div class="loading"></div>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{route('admin.user.roles', $user->id)}}"><i class="fa fa-lg fa-lock" title="Papéis de {{ $user->name }}"></i></a>
                            <a href="{{route('admin.user.view', $user->id)}}"><i class="fa fa-lg fa-eye" title="Visualizar {{ $user->name }}"></i></a>
                            <a href="{{route('admin.user.edit', $user->id)}}"><i class="fa fa-lg fa-pencil" title="Editar {{ $user->name }}"></i></a>
                            <a href="{{route('admin.user.delete', $user->id)}}"><i class="fa fa-lg fa-times" title="Excluir {{ $user->name }}"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>

@stop