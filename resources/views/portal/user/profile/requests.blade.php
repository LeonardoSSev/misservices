@extends('portal.user.profile.profile')
@section('content-profile') 
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('user.profile') }}">Perfil</a></li>
            <li><a href="{{ route('user.requests') }}">Propostas</a></li>
        </ul>
    </div>
    <div class="lista-propostas">
        @if(count($servicesRequests) > 0)
            <h4>Propostas</h4>
            @foreach($servicesRequests as $request)
                <div class="box box-shadow">
                    <div></div>
                    <p>Solicitante: {{$request->userName}}</p>
                    <p>Serviço solicitado: {{$request->serviceName}}</p>
                    <p>Data de solicitação: {{$request->date}}</p>
                    <div class="buttons-decision">
                        <a href="{{route('user.request.accept', $request->id)}}">
                            <button class="btn btn-success">Aprovar <i class="fa fa-check"></i> </button>
                        </a>
                        <a href="{{route('user.request.refuse', $request->id)}}">
                            <button class="btn btn-danger">Recusar <i class="fa fa-times"></i> </button>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="box">
                <p>Não há nenhuma solicitação para o seu serviço ainda.</p>
            </div>
        @endif
    </div>
@stop