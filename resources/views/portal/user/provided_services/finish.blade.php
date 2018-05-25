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
        <div style="border: 2px solid black;">
            <h5>Confirmar pagamento</h5>
        </div>
        <div style="border: 2px solid black; margin-top: 10px;">
            <h3>Avaliação</h3>
            @if($rateDone)
                <div>
                    <h5>Você já avaliou esse serviço</h5>
                </div>
            @else
                <div>
                    <h5>Avaliar {{Auth()->user()->id === $providedService->client_id ? "Prestador de Serviço" : "Cliente"}}</h5>
                    <form action="{{route('user.rate.request', $providedService->id)}}" method="POST">
                        {!! csrf_field() !!}
                        <div>
                            <label for="rate">
                                Nota que você daria para o {{Auth()->user()->id === $providedService->client_id ? "prestador de serviço" : "cliente"}} em relação ao serviço realizado?
                            </label>
                            <select name="rate" id="rate">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <button type="submit">Avaliar</button>
                        </div>
                    </form>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>

@include('templates.sections.footer')