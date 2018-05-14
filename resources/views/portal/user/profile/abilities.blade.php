@extends('templates.temp')
@section('content')
@include('templates.sections.header')

<div class="container" id="perfil">
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
        @if (session('statusFalse'))
        <div class="alert alert-danger">
            {{session('statusFalse')}}
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
            <form action="{{route('user.add.abilities')}}" method="POST">
                {{ csrf_field() }}
                <label for="ability">Adicionar habilidade:</label>
                <input type="text" name="ability">
                <button type="submit">Adicionar habilidade</button>
            </form>
        </div>
        <div>
            @if(!count($abilities) > 0)
                <div style="border: 2px black solid;">
                    <p>Você não possui nenhuma habilidade cadastrada ainda</p>
                </div>
            @else

                @foreach($abilities as $ability)
                    <div style="border: 2px black solid;">
                        <p>{{$ability->name}}<span style="float:right;"><a href="{{route('user.remove.ability', $ability->id)}}" style="text-decoration: none; color: black;">X</a></span></p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@include('templates.sections.footer')
@stop