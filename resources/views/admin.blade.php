@extends('template.temp')
@include('template.header')
<div class="login-admin container">
    <form action="">
        <input type="text" placeholder="Username" class="box radius" >
        <input type="password" placeholder="Senha" class="box radius">
        <button class="btn bg-black radius">Acessar</button>
    </form>
</div>

@include('template.footer')
