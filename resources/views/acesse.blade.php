@extends('template.temp')
@include('template.header')
{{$erro or ''}}
<div class="login container">
    <form method="post" action="/api/auth/login">
        <input type="text" placeholder="Username" name="email" class="box box-desk radius" >
        <input type="password" placeholder="Senha" name="password" class="box box-desk radius">
        <button class="btn btn-desk bg-black radius">Acessar</button>
    </form>
</div>

@include('template.footer')