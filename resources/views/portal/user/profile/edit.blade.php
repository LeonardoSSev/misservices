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
                <li><b>Seu e-mail:</b> {{ $user->email }}</li>
                <li><b>Estado:</b> {{ $user->state }}</li>
                <li><b>Cidade:</b> {{ $user->city }}</li>
                <li><b>Sobre mim:</b> {{ Auth()->user()->about }}</li>
                <li><a href="{{route('user.edit.profile')}}">Editar Informações</a></li>
            </ul>
        </div>
        <div class="col-lg-8" id="actions">
            <form action="{{route('user.update.profile')}}" method="POST">
                {{ csrf_field() }}
                <div>
                    <label for="name">Nome:</label>
                    <input type="text" name="name" value="{{$user->name}}" required>
                </div>
                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" value="{{$user->email}}" required>
                </div>
                <div>
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" value="{{$user->cpf}}" required>
                </div>
                <div>
                    <label for="telephone">Telefone:</label>
                    <input type="text" name="telephone" value="{{$telephone->ddd.$telephone->number}}" required>
                </div>
                <div>
                    <label for="cellphone">Celular:</label>
                    <input type="text" name="cellphone" value="{{$cellphone->ddd.$cellphone->number}}" required>
                </div>
                <div>
                    <label for="state">UF:</label>
                    <input type="text" name="state" value="{{$user->state}}" required>
                </div>
                <div>
                    <label for="city">Cidade:</label>
                    <input type="text" name="city" value="{{$user->city}}" required>
                </div>
                <div>
                    <label for="zipcode">CEP:</label>
                    <input type="text" name="zipcode" value="{{$user->zipcode}}" required>
                </div>
                <div>
                    <label for="neighbourhood">Bairro:</label>
                    <input type="text" name="neighbourhood" value="{{$user->neighbourhood}}" required>
                </div>
                <div>
                    <label for="address">Endereço:</label>
                    <input type="text" name="address" value="{{$user->address}}" required>
                </div>
                <div>
                    <label for="about">Sobre mim:</label>
                    <textarea name="about" id="about" cols="30" rows="10">{{$user->about}}</textarea>
                </div>
                <div>
                    <button type="submit">Editar informações</button>
                </div>
            </form>
        </div>
        <div>
            <form action="{{route('user.update.password')}}" method="POST">
                {{ csrf_field() }}
                <div>
                    <label for="password">Nova senha:</label>
                    <input type="password" name="password" required>
                </div>
                <div>
                    <label for="password">Digite novamente a nova senha:</label>
                    <input type="password" name="password2" required>
                </div>
                <div>
                    <button type="submit">Editar senha</button>
                </div>
            </form>
        </div>
    </div>
    @include('templates.sections.footer')
@stop