@extends('templates.temp')
@include('templates.sections.header')

<div class="container" style="padding-top: 15%;">
    <h3>Dados sobre o Provedor de Serviços:</h3>
    <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
        @if($averageRate != 0)
            <p>Média de avaliações: {{$averageRate}}/5</p>
        @else
            <p>Esse usuário não realizou ou concluiu esse serviço ainda!</p>
        @endif
    </div>
    <h3>Últimos comentários:</h3>
    @if(count($serviceDetails) > 0)
        @foreach($serviceDetails as $detail)
        <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
            <p>{{$detail->userId}} - {{$detail->userName}}</p>
            <p>{{$detail->rate}}</p>
            <p>{{$detail->comment}}</p>
            <p>R${{$detail->price}}</p>
        </div>
        @endforeach
    @else
        <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
            <p>Esse usuário não realizou ou concluiu esse serviço ainda!</p>
        </div>
    @endif
</div>

@include('templates.sections.footer')