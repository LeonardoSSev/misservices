@extends('portal.user.profile.profile')
@section('content-profile')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('user.profile') }}">Perfil</a></li>
            <li><a href="{{ route('user.current.services') }}">Serviços em andamento</a></li>
        </ul>
    </div>
    <div>
        @if(count($servicesRequestsNotAnswered) > 0)
            @foreach($servicesRequestsNotAnswered as $servicesNotOpened)
                <div class="box box-shadow">
                    <h5>Prestador ainda não respondeu a sua solicitação</h5>
                    <p>Cliente: {{$servicesNotOpened->clientName}}</p>
                    <p>Prestador de serviço: {{$servicesNotOpened->providerName}}</p>
                    <p>Serviço: {{$servicesNotOpened->serviceName}}</p>
                    <p>Estado: {{$servicesInProgress->providedServiceStatus}}</p>
                    <a href="{{route('user.cancel.request', $servicesNotOpened->providedServiceId)}}"><button class="btn btn-danger">Cancelar solicitação</button></a>
                </div>
            @endforeach
        @endif
    </div>
    <hr>
    <div>
        @if(!count($servicesRequestsInProgress) > 0)
            <div class="box">
                <p>Não há nenhum serviço solicitado em andamento</p>
            </div>
        @else
            @foreach($servicesRequestsInProgress as $servicesInProgress)
                <h5>Serviços solicitados em andamento</h5>
                <div class="box box-shadow">
                    <p>Cliente: {{$servicesInProgress->clientName}}</p>
                    <p>Prestador de serviço: {{$servicesInProgress->providerName}}</p>
                    <p>Serviço: {{$servicesInProgress->serviceName}}</p>
                    <p>Estado: {{$servicesInProgress->providedServiceStatus}}</p>
                    <div class="buttons-decision">
                        <a href="{{route('user.cancel.request', $servicesInProgress->providedServiceId)}}"><button class="btn btn-danger">Cancelar</button></a>
                        <a href="{{route('user.finish.request', $servicesInProgress->providedServiceId)}}"><button class="btn btn-success">Confirmar Finalização</button></a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <hr>
    <div>
        @if(count($servicesRequestsInProgressForProvider) === 0)
            <div class="box">
                <p>Não há nenhum serviço provido em andamento</p>
            </div>
        @else
            @foreach($servicesRequestsInProgressForProvider as $servicesInProgress)
                <h5>Serviços providos em andamento</h5>
                <div class="box box-shadow">
                    <p>Prestador de serviço: {{$servicesInProgress->providerName}}</p>
                    <p>Cliente: {{$servicesInProgress->clientName}}</p>
                    <p>Serviço: {{$servicesInProgress->serviceName}}</p>
                    <p>Estado: {{$servicesInProgress->providedServiceStatus}}</p>
                    <form action="{{route('user.price.request', $servicesInProgress->providedServiceId)}}" class="form" method="POST">
                        {!!csrf_field() !!}
                        <label for="price" class="col-md-12">Valor (RS):
                        <label for="price">
                            <input class="form-control" type="number" name="price" id="price" value="{{$servicesInProgress->providedServicePrice}}">
                        </label></label>
                        <button class="btn btn-primary" type="submit">Alterar</button>
                    </form>
                    <div class="buttons-decision">
                    <a href="{{route('user.cancel.request', $servicesInProgress->providedServiceId)}}"><button class="btn btn-success">Cancelar</button></a>

                    <a href="{{route('user.finish.request', $servicesInProgress->providedServiceId)}}"><button class="btn btn-danger">Finalizar</button></a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@stop