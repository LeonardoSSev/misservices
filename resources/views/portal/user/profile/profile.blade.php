@extends('templates.temp')
@section('content')
@include('templates.sections.header')

<div class="container" id="perfil">
    @if (session('errors'))
        <div class="alert alert-danger">
            {{session('errors')}}
        </div>
    @endif
    <div class="col-lg-4" id="perfil-info">
        <div class="row primary-info">
            <img src="{{ asset('images/logo-misservices.png') }}" alt="perfil" class="img-perfil img-responsive">
            <div class="col-md2">
                <form action="{{route('user.profile.image', $user->id)}}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <input type="file" name="image">
                    <button type="submit">Enviar imagem</button>
                </form>
            </div>
            <span class="name-user">{{ $user->name }}</span>
        </div>
        <ul>
            <li><b>Seu e-mail:</b> {{ $user->email }}</li>
            <li><b>Estado:</b> {{ $user->state }}</li>
            <li><b>Cidade:</b> {{ $user->city }}</li>
            <li><b>Sobre mim:</b> {{ $user->about }}</li>
            <li><a href="user/{{$user->id}}/edit">Editar Informações</a></li>
        </ul>
    </div>
    <div class="col-lg-8" id="actions">
        <ul>
            <a href="#"><li class="box-list col-lg-3">
                <span>Mensagens</span>
                <i class="fa fa-comment-o"></i>
            </li></a>
            <a href="#"><li class="box-list col-lg-3">
                <span> Habilidades</span>
                <i class="fa fa-address-card-o"></i>
            </li></a>
            <a href="#"><li class="box-list col-lg-3">
                <span> Propostas</span>
                <i class="fa fa-paper-plane-o"></i>
            </li></a>
            <a href="#"><li class="box-list col-lg-3">
                <span> Trabalhos Realizados</span>
                <i class="fa fa-cogs"></i>
            </li></a>
        </ul>
    </div>
</div>
@include('templates.sections.footer')
@stop