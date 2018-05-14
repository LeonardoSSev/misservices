@extends('templates.temp')
@include('templates.sections.header')


<div class="container">
    <h2>Buscar por {{$category->name}}</h2>
    <h5>Serviços relacionados a {{$category->name}}</h5>
    @foreach ($services as $service)
        <div style="border: 2px black solid; boorder-radius: 5%; margin: 10%;">
            <div class="row primary-info">
                @if($service->user_image != null)
                    <img src="{{ url('storage/users/'.$service->user_image) }}" alt="{{$service->user_name}}" class="img-perfil img-responsive">
                @else
                    <img src="{{ asset('images/logo-misservices.png') }}" alt="perfil" class="img-perfil img-responsive">
                @endif
            </div>
            <p>{{$service->name}}</p>
            <p>{{$service->description}}</p>
            <p>{{$service->user_name}}</p>
            <a href="{{route('user.service.details', [$service->user_id, $service->id])}}">
                <p>Ver detalhes</p>
            </a>
        </div>
    @endforeach
    {!! $services->links() !!}
</div>

@include('templates.sections.footer')