@extends('painel.admin')
@section('content-admin')
    <main class="painel">
        <h1>Painel de Administração</h1>
        <vc-users users="{{ $users }}"></vc-users>
    </main>
@stop