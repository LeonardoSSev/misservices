@extends('templates.temp')
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
            @if(!$numServices > 0)
                <div style="border: 2px black solid;">
                    <p>Você ainda não tem nenhum serviço cadastrado</p>
                </div>
            @else
                <h4>Meus serviços</h4>
                @foreach($services as $service)
                    <div style="border: 2px black solid;">
                        <p>{{$service->name}}</p>
                        <p>{{$service->description}}</p>
                    </div>
                @endforeach
            @endif
        </div>
        <div>
            @if(count($servicesRequests) > 0)
                <h4>Propostas</h4>
                @foreach($servicesRequests as $request)
                    <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
                        <div></div>
                        <p>{{$request->userName}}</p>
                        <p>{{$request->serviceName}}</p>
                        <p>{{$request->date}}</p>
                        <a href="{{route('user.request.accept', $request->id)}}" style="color: black;">
                            <button>Aprovar</button>
                        </a>
                        <a href="{{route('user.request.refuse', $request->id)}}" style="color: black;">
                            <button>Recusar</button>
                        </a>
                    </div>
                @endforeach
            @else
                <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
                    <p>Não há nenhuma solicitação para o seu serviço ainda.</p>
                </div>
            @endif
        </div>
    </div>
</div>

@include('templates.sections.footer')