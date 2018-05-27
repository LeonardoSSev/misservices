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
        <h1>Painel de Administração</h1>
        <a href="{{route('admin.permission.create')}}" class="btn btn-primary">Adicionar</a>
        <div class="col-lg-4">
            <input type="text" class="form-control" placeholder="Pesquise uma permissão..." name="pesquisar">
        </div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <div class="loading"></div>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>
                            <a href="{{route('admin.permission.edit', $permission->id)}}"><i class="fa fa-lg fa-pencil" title="Editar {{ $permission->name }}"></i></a>
                            <a href="{{route('admin.permission.delete', $permission->id)}}"><i class="fa fa-lg fa-times" title="Excluir {{ $permission->name }}"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $permissions->links() !!}
    </main>
@endsection