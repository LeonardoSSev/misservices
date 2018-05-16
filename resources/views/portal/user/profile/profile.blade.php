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
        <ul>
            <a href="#"><li class="box-list col-lg-3">
                <span>Mensagens</span>
                <i class="fa fa-comment-o"></i>
            </li></a>
            <a href="{{route('user.abilities')}}"><li class="box-list col-lg-3">
                <span>Habilidades</span>
                <i class="fa fa-address-card-o"></i>
            </li></a>
            <a href="{{route('user.requests')}}"><li class="box-list col-lg-3">
                <span>Propostas</span>
                <i class="fa fa-paper-plane-o"></i>
            </li></a>
            <a href="{{route('user.current.services')}}"><li class="box-list col-lg-3">
                <span>Serviços em Andamento</span>
                <i class="fa fa-cogs"></i>
            </li></a>
            <a href="{{route('user.requested')}}"><li class="box-list col-lg-3">
                <span>Histórico de Serviços</span>
                <i class="fa fa-cogs"></i>
            </li></a>
            <a href="{{route('user.services')}}"><li class="box-list col-lg-3">
                <span>Meus Serviços</span>
                <i class="fa fa-cogs"></i>
            </li></a>
        </ul>
    </div>
</div>
@include('templates.sections.footer')
@stop