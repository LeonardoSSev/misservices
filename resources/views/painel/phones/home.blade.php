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
        <a href="{{route('admin.phone.create')}}" class="btn-add" title="Adicionar">+</a>
        <form action="" class="form-group" method="GET">
            <div class="col-lg-3">
                <input type="text" class="form-control" placeholder="Pesquise o ID de um telefone..." name="search-phones">
            </div>
            <div class="col-lg-3">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>DDD</th>
                <th>Número</th>
                <th>Tipo de Telefone</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                @foreach($phones as $phone)
                    <tr>
                        <div class="loading"></div>
                        <td>{{ $phone->id }}</td>
                        <td>{{ $phone->ddd }}</td>
                        <td>{{ $phone->number }}</td>
                        <td>{{ $phone->phoneTypeName }}</td>
                        <td>
                            <a href="{{ route('admin.phone.users', $phone->id) }}"><i class="fa fa-lg fa-user" title="Visualizar usuários que usam {{ $phone->number }}"></i></a>
                            <a href="{{ route('admin.phone.edit', $phone->id) }}"><i class="fa fa-lg fa-pencil" title="Editar {{ $phone->number }}"></i></a>
                            <a href="{{ route('admin.phone.delete', $phone->id) }}"><i class="fa fa-lg fa-times" title="Excluir {{ $phone->number }}"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $phones->links() !!}
    </main>
</div>
@endsection