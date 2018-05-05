@extends('painel.templates.template-admin')
@section('content-admin')
    <main class="painel container">
        <h1>Painel de Administração</h1>
        <a href="{{route('admin.role.create')}}" class="btn btn-primary">Adicionar</a>
        <div class="col-lg-3">
            <input type="text" class="form-control" placeholder="Pesquise um papel..." name="pesquisar">
        </div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <div class="loading"></div>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <a href="{{route('admin.role.users', $role->id)}}"><i class="fa fa-lg fa-user" title="Usuários que são {{ $role->name }}"></i></a>
                            <a href="{{route('admin.role.permissions', $role->id)}}"><i class="fa fa-lg fa-unlock" title="Permissões de {{ $role->name }}"></i></a>
                            <a href="{{route('admin.role.edit', $role->id)}}"><i class="fa fa-lg fa-pencil" title="Editar {{ $role->name }}"></i></a>
                            <a href="{{route('admin.role.delete', $role->id)}}"><i class="fa fa-lg fa-times" title="Excluir {{ $role->name }}"></i></a>
                            <a href="{{route('admin.role.view', $role->id)}}"><i class="fa fa-lg fa-eye" title="Visualizar {{ $role->name }}"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $roles->links() !!}
    </main>
</div>
@endsection