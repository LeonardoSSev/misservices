@extends('templates.temp')
@include('templates.sections.header')

<div class="container" style="padding-top: 15%;">
    <h3>Histórico de serviços</h3>
    @if (count($providedServices) > 0)
        @foreach($providedServices as $requested)
            <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
                <p>Cliente: {{$requested->clientName}}</p>
                <p>Serviço: {{$requested->serviceName}}</p>
                <p>Prestador do Serviço: {{$requested->providerName}}</p>
                <p>Estado: {{$requested->providedServiceStatus}}</p>
                <p>Início: {{$requested->providedServiceCreatedAt}}</p>
                <p>Última atualização:{{ $requested->providedServiceUpdatedAt }}</p>
            </div>
        @endforeach
    @else
        <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
            <p>Você ainda não tem nenhum serviço em seu histórico.</p>
        </div>
    @endif
</div>

@include('templates.sections.footer')