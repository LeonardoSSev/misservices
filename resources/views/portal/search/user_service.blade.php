@extends('templates.temp')
@include('templates.sections.header')

<div style="padding-top: 10%";>

    @if($numberServices != 0)
        <p>Número de vezes que fez esse serviço: {{$numberServices}}</p>
        <p>Avaliações: {{$rate}}/5</p>
    @else
        <p>Este usuário ainda não realizou nenhuma vez esse tipo de serviço.</p>
        <p>Esse usuário não tem nenhuma avaliação ainda.</p>
    @endif
</div>

@include('templates.sections.footer')