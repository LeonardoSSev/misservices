@extends('portal.user.profile.profile')
@section('content-profile')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('user.profile') }}">Perfil</a></li>
            <li><a href="{{ route('user.requested') }}">Histórico de Serviços</a></li>
        </ul>
    </div>

<div>
    <h3>Histórico de serviços</h3>
    @if (count($providedServices) > 0)
        @foreach($providedServices as $requested)
            <div class="box box-shadow">
                <p>Cliente: {{$requested->clientName}}</p>
                <p>Serviço: {{$requested->serviceName}}</p>
                <p>Prestador do Serviço: {{$requested->providerName}}</p>
                <p>Estado: {{$requested->providedServiceStatus}}</p>
                <p>Início: {{$requested->providedServiceCreatedAt}}</p>
                <p>Última atualização:{{ $requested->providedServiceUpdatedAt }}</p>
            </div>
        @endforeach
    @else
        <div class="box">
            <p>Você ainda não tem nenhum serviço em seu histórico.</p>
        </div>
    @endif
</div>
@stop