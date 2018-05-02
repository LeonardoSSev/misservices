@extends('templates.temp')
@include('templates.sections.header')

<div class="container" style="padding-top: 15%;">
    @if(count($servicesRequested) > 0)
        @foreach($servicesRequested as $requested)
            <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
                <p>{{$requested->userName}}</p>
                <p>{{$requested->serviceName}}</p>
                <p>{{$requested->date}}</p>
                @if($requested->status == 'OPENED')
                    <p>Esperando aceitação do {{$requested->userName}}</p>
                @else
                    <p>{{$requested->status == 'PROGRESS' ? 'Em progresso' : 'Finalizado (PAGO)'}}</p>
                @endif

            </div>
        @endforeach
    @else
        <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
            <p>Você ainda não solicitou nenhum serviço.</p>
        </div>
    @endif
</div>

@include('templates.sections.footer')