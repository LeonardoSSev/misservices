@extends('templates.temp')
@section('content')
@include('templates.sections.header')

<div class="overlay-modal">
    <div class="modal">
        <div class="this-modal-content">
            <span class="close"><i class="fa fa-times"></i></span>
            <form action="{{route('user.profile.image', Auth()->user()->id)}}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <label for="image-upload" class="select-image">
                    <span>Selecionar Imagem</span>
                </label>
                <input type="file" name="image" id="image-upload">
                <div id="image-selected"></div>
                <button type="submit" class="btn-upload-image">Enviar</button>
            </form>
        </div>
    </div>
</div>

<div class="container" id="perfil">
    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
        @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="col-lg-4" id="perfil-info">
        <div class="row primary-info">
            <figure class="box-img-perfil">
                @if(auth()->user()->image != null)
                    <img src="{{ url('storage/users/'.auth()->user()->image) }}" alt="{{auth()->user()->name}}" class="img-perfil img-responsive">
                    @else
                    <img src="{{ asset('images/logo-misservices.png') }}" alt="perfil" class="img-perfil img-responsive">
                @endif
                <figcaption class="overlay-img-perfil" title="Adicionar/Alterar Imagem">
                    <button id="open-modal" class="add-image">
                        <i class="fa fa-plus"></i>
                    </button>
                </figcaption>
            </figure>
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
        @yield('content-profile')
    </div>
</div>
@include('templates.sections.footer')
@stop