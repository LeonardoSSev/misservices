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
            <h4>Cadastrar serviço</h4>
            <div>
                <form action="{{route('user.store.service')}}" method="POST">
                    {{ csrf_field() }}
                    <div>
                        <label for="name">Nome do serviço:</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label for="description">Descrição do serviço:</label>
                        <input type="text" name="description">
                    </div>
                    <div>
                        <label for="category"></label>
                        <select id="category" class="box box-desk radius" name="category" required>
                            @foreach( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <div>
                            <button type="submit">Adicionar serviço</button>
                        </div>
                        <div>
                            <a href="{{route('contact.message', ['Categoria inexistente'])}}" style="color: dodgerblue;">Não tem nenhuma categoria relacionada ao seu serviço? Contate-nos</a>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                @if(!$numServices > 0)
                     <div style="border: 2px black solid;">
                         <p>Você ainda não tem nenhum serviço cadastrado</p>
                     </div>
                @else
                    @foreach($services as $service)
                        <div style="border: 2px black solid;">
                            <p>{{$service->name}}</p>
                            <p>{{$service->description}}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @include('templates.sections.footer')
@stop