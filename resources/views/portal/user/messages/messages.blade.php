@extends('portal.user.profile.profile')
@section('content-profile')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('user.profile') }}">Perfil</a></li>
            <li><a href="{{ route('user.messages') }}">Mensagens</a></li>
        </ul>
    </div>
    <div class="messages">
        @if (count($userProvidedServices) > 0)
            @foreach ($userProvidedServices as $key => $providedService)
                <div class="box box-shadow">
                    <a href="{{route('user.service.chat', $providedService->providedServiceId)}}">
                        <div class="user-information">
                            <p class="nome">{{$providedService->providerName}}</p>
                            <p>{{$providedService->serviceName}}</p>
                        </div>
                        <div class="last-message">
                        @if ( !empty( $providedService->lastMessage ) )
                            <p class="left">        
                                {{ $providedService->lastMessage[0]->text }}
                            </p>
                            <p class="right">
                                {{ $providedService->lastMessage[0]->created_at }}
                            </p>
                        @endif
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="box">
                <p>Não há nenhuma mensagem</p>
            </div>
        @endif
    </div>
@stop