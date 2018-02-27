@extends('template.temp')
<div class="confirm">
<h1>Você realmente deseja excluir este usuario?</h1>
    <form>
        <a href="/admin/destroy/{{ $id }}" id="sim" class="btn btn-desk radius">Sim</a>
        <a href="/admin" id="nao" class="btn btn-desk radius">Não</a>
    </form>
</div>