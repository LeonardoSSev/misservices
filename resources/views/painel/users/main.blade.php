@extends('painel.templates.template-admin')
@section('content-admin')
    <div class="painel">
        {{--<h1>Painel de Administração</h1>--}}
        {{--<input type="text" class="form-control" placeholder="Pesquise um usuário..." name="pesquisar">--}}
        {{--<table class="table">--}}
            {{--<th>ID</th>--}}
            {{--<th>Nome</th>--}}
            {{--<th>E-mail</th>--}}
            {{--<tr>--}}
                {{--<div class="loading"></div>--}}
                {{--<td>@{{ user.id }}</td>--}}
                {{--<td>@{{ user.nome }}</td>--}}
                {{--<td>@{{ user.email }}</td>--}}
                {{--<td>--}}
                    {{--<!--a href="/admin/user/edit/@{{ user.id }}"><i class="fa fa-lg fa-pencil"></i></a>--}}
                    {{--<a href="/admin/confirm/@{{ user.id }}"><i class="fa fa-lg fa-times"></i></a-->--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--</table>--}}
    </div>
@endsection