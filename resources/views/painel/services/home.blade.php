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
        <a href="{{route('admin.service.create')}}" class="btn-add" title="Adicionar">+</a>
        <form action="" class="form-group" method="GET">
            <div class="col-lg-3">
                <input type="text" class="form-control" placeholder="Pesquise um serviço..." name="search-service">
            </div>
            <div class="col-lg-3">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Descrição</th>
            <th width="150px">Ações</th>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <div class="loading"></div>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->username }}</td>
                    <td>{{ $service->description }}</td>
                    <td>
                        <a href="{{route('admin.service.view', $service->id)}}"><i class="fa fa-lg fa-eye" title="Editar {{ $service->name }}"></i></a>
                        <a href="{{route('admin.service.edit', $service->id)}}"><i class="fa fa-lg fa-pencil" title="Editar {{ $service->name }}"></i></a>
                        <a href="{{route('admin.service.delete', $service->id)}}"><i class="fa fa-lg fa-times" title="Excluir {{ $service->name }}"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $services->links() !!}
    </main>
</div>

@endsection