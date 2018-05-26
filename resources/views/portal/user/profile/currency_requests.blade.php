@extends('portal.user.profile.profile')
@section('content-profile')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('user.profile') }}">Perfil</a></li>
            <li><a href="">Serviços em andamento</a></li>
        </ul>
    </div>
    <div>
        @if(count($servicesRequestsNotAnswered) > 0)
            @foreach($servicesRequestsNotAnswered as $servicesNotOpened)
                <div style="border: 2px solid black;">
                    <h5>Prestador ainda não respondeu a sua solicitação</h5>
                    <p>Cliente: {{$servicesNotOpened->clientName}}</p>
                    <p>Prestador de serviço: {{$servicesNotOpened->providerName}}</p>
                    <p>Serviço: {{$servicesNotOpened->serviceName}}</p>
                    <p>Estado: {{$servicesInProgress->providedServiceStatus}}</p>
                    <a href="{{route('user.cancel.request', $servicesNotOpened->providedServiceId)}}"><button style="color: black;">Cancelar solicitação</button></a>
                </div>
            @endforeach
        @endif
    </div>
    <hr>
    <div>
        @if(!count($servicesRequestsInProgress) > 0)
            <div style="border: 2px solid black;">
                <p>Não há nenhum serviço solicitado em andamento</p>
                <a href="{{route('user.search.categories') }}">
                    <p>Procurar por um serviço</p>
                </a>
            </div>
        @else
            @foreach($servicesRequestsInProgress as $servicesInProgress)
                <h5>Serviço solicitado em andamento</h5>
                <div style="border: 2px solid black;">
                    <p>Cliente: {{$servicesInProgress->clientName}}</p>
                    <p>Prestador de serviço: {{$servicesInProgress->providerName}}</p>
                    <p>Serviço: {{$servicesInProgress->serviceName}}</p>
                    <p>Estado: {{$servicesInProgress->providedServiceStatus}}</p>
                    <a href="{{route('user.cancel.request', $servicesInProgress->providedServiceId)}}"><button style="color: black;">Cancelar prestação de serviço</button></a>
                    <a href="{{route('user.finish.request', $servicesInProgress->providedServiceId)}}"><button style="color: black;">Finalizar Serviço</button></a>
                </div>
            @endforeach
        @endif
    </div>
    <hr>
    <div>
        @if(count($servicesRequestsInProgressForProvider) === 0)
            <div style="border: 2px solid black;">
                <p>Não há nenhum serviço provido em andamento</p>
                <a href="{{route('user.search.categories') }}">
                    <p>Procurar por um serviço</p>
                </a>
            </div>
        @else
            @foreach($servicesRequestsInProgressForProvider as $servicesInProgress)
                <h5>Serviço provido em andamento</h5>
                <div style="border: 2px solid black;">
                    <p>Prestador de serviço: {{$servicesInProgress->providerName}}</p>
                    <p>Cliente: {{$servicesInProgress->clientName}}</p>
                    <p>Serviço: {{$servicesInProgress->serviceName}}</p>
                    <p>Estado: {{$servicesInProgress->providedServiceStatus}}</p>
                    <form action="{{route('user.price.request', $servicesInProgress->providedServiceId)}}" method="POST">
                        {!!csrf_field() !!}
                        <label for="price">Valor (RS):</label>
                        RS<input type="number" name="price" id="price" value="{{$servicesInProgress->providedServicePrice}}">
                        <button style="color: black;" type="submit">Alterar valor Serviço</button>
                    </form>
                    <a href="{{route('user.cancel.request', $servicesInProgress->providedServiceId)}}"><button style="color: black;">Cancelar prestação de serviço</button></a>

                    <a href="{{route('user.finish.request', $servicesInProgress->providedServiceId)}}"><button style="color: black;">Finalizar Serviço</button></a>
                </div>
            @endforeach
        @endif
    </div>
@stop