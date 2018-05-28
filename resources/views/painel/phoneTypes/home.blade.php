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
        <a href="{{ route('admin.phone_type.create') }}" class="btn btn-primary">Adicionar</a>
        <div class="col-lg-3">
            <input type="text" class="form-control" placeholder="Pesquise um tipo de telefone..." name="pesquisar">
        </div>
        <table class="table">
            <thead>
                <th>Nome</th>
                <th>Descrição</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                @foreach($phoneTypes as $phone_type)
                    <tr>
                        <div class="loading"></div>
                        <td>{{ $phone_type->name }}</td>
                        <td>{{ $phone_type->description }}</td>
                        <td>
                            <a href="{{ route('admin.phone_type.edit', $phone_type->id) }}"><i class="fa fa-lg fa-pencil" title="Editar {{ $phone_type->name }}"></i></a>
                            <a href="{{ route('admin.phone_type.delete', $phone_type->id) }}"><i class="fa fa-lg fa-times" title="Excluir {{ $phone_type->name }}"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $phoneTypes->links() !!}
    </main>
</div>
@endsection