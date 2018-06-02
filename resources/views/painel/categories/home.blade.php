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
    <a href="{{route('admin.category.create')}}" class="btn-add" title="Adicionar">+</a>
    <form action="" class="form-group" method="GET">
        <div class="col-lg-3">
            <input type="text" class="form-control" placeholder="Pesquise uma categoria..." name="search-category">
        </div>
        <div class="col-lg-3">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th width="150px">Ações</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <div class="loading"></div>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{route('admin.category.edit', $category->id)}}"><i class="fa fa-lg fa-pencil" title="Editar {{ $category->name }}"></i></a>
                        <a href="{{route('admin.category.delete', $category->id)}}"><i class="fa fa-lg fa-times" title="Excluir {{ $category->name }}"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $categories->links() !!}
</main>
@endsection
