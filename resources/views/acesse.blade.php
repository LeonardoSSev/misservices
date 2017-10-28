@extends('template.temp')
@include('template.header')
<div class="login container">
    <form action="">
        <input type="text" placeholder="Username" class="box box-desk radius" >
        <input type="password" placeholder="Senha" class="box box-desk radius">
        <button class="btn btn-desk bg-black radius">Acessar</button>
    </form>
</div>

@include('template.footer')