@extends('painel.templates.template-admin')
@section('content-admin')

<p>Total de Usuários: {{$totalUsers}}</p>
<p>Total de Categorias: {{$totalCategories}}</p>
<p>Total de Serviços: {{$totalServices}}</p>
<p>Total de Papéis: {{$totalRoles}}</p>
<p>Total de Permissões: {{$totalPermissions}}</p>
<p>Total de Telefones: {{$totalPhones}}</p>
<p>Total de Tipos de Telefone: {{$totalPhoneTypes}}</p>

@stop
