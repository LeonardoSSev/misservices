@extends('templates.temp')
@section('content')
@include('templates.sections.header')

<div class="container" id="perfil">
    @if (session('errors'))
        <div class="alert alert-danger">
            {{session('errors')}}
        </div>
    @endif
        @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="col-lg-4" id="perfil-info">
        <div class="row primary-info">
            @if(auth()->user()->image != null)
                <img src="{{ url('storage/users/'.auth()->user()->image) }}" alt="{{auth()->user()->name}}" class="img-perfil img-responsive">
                @else
                <img src="{{ asset('images/logo-misservices.png') }}" alt="perfil" class="img-perfil img-responsive">
            @endif

            <div class="col-md2">
                <form action="{{route('user.profile.image', Auth()->user()->id)}}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <input type="file" name="image">
                    <button type="submit">Enviar imagem</button>
                </form>
            </div>
            <span class="name-user">{{ Auth()->user()->name }}</span>
        </div>
        <ul>
            <li><b>Seu e-mail:</b> {{ Auth()->user()->email }}</li>
            <li><b>Estado:</b> {{ Auth()->user()->state }}</li>
            <li><b>Cidade:</b> {{ Auth()->user()->city }}</li>
            <li><b>Sobre mim:</b> {{ Auth()->user()->about }}</li>
            <li><a href="{{route('user.edit.profile')}}">Editar Informações</a></li>
        </ul>
    </div>
    <div class="col-lg-8" id="actions">
        <div>
            @if(count($servicesRequestsNotAnswered) > 0)
                @foreach($servicesRequestsNotAnswered as $servicesNotOpened)
                    <div style="border: 2px solid black;">
                        <h5>Prestador ainda não respondeu a sua solicitação</h5>
                        <p>Cliente: {{$servicesNotOpened->clientName}}</p>
                        <p>Prestador de serviço: {{$servicesNotOpened->providerName}}</p>
                        <p>Serviço: {{$servicesNotOpened->serviceName}}</p>
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
                        <p>{{$servicesInProgress->clientName}}</p>
                        <p>{{$servicesInProgress->providerName}}</p>
                        <p>{{$servicesInProgress->serviceName}}</p>
                        <a href="{{route('user.cancel.request', $servicesInProgress->providedServiceId)}}"><button style="color: black;">Cancelar prestação de serviço</button></a>
                    </div>
                @endforeach
            @endif
        </div>
        <hr>
        <div>
            @if(!count($servicesRequestsInProgressForProvider) > 0)
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
                        <p>{{$servicesInProgress->providerName}}</p>
                        <p>{{$servicesInProgress->clientName}}</p>
                        <p>{{$servicesInProgress->serviceName}}</p>
                        <a href="{{route('user.cancel.request', $servicesInProgress->providedServiceId)}}"><button style="color: black;">Cancelar prestação de serviço</button></a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@include('templates.sections.footer')
@stop