<<<<<<< HEAD
@extends('portal.user.profile.profile')
@section('content-profile')
    <div class="breadcrumb">
=======
@extends('templates.temp')
@include('templates.sections.header')

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
>>>>>>> cc01449d53fa9d7cd1337b688b3d5cd0eb8b3b3b
        <ul>
            <li><a href="{{ route('user.profile') }}">Perfil</a></li>
            <li><a href="{{ route('user.current.services') }}"></a>Serviços em Andamento</li>
            <li><a href="{{ route('user.finish.request') }}"></a>Finalização do Serviço</li>
        </ul>
    </div>
    <div class="box">
        <h5>Confirmar pagamento</h5>
        @if(Auth()->user()->id === $providedService->client_id)

            @if ($providedService->price == null)
                <h5>Aguardando prestador de serviço definir valor</h5>
            @else
                <h5>O valor é R${{$providedService->price}}</h5>
            @endif

            @if ($providedService->isPaid == "1")
                <h5>Aguardando avaliação dos usuários.</h5>
            @elseif ($providedService->isPaid == "0")
                <h5>Aguardando aprovação de pagamento pelo prestador de serviço</h5>
            @else
                <form action="{{route('user.pay.request', $providedService->id)}}" method="POST">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-success" >Confirmar Pagamento</button>
                </form>
            @endif
        @else
            @if ($providedService->isPaid == "0")
                <form action="{{route('user.pay.request', $providedService->id)}}" method="POST">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-sucess">Confirmar Pagamento do Cliente</button>
                </form>
            @else
                <h5>Aguardando avaliação dos usuários.</h5>
            @endif
        @endif
    </div>
    <div class="box box-shadow">
        <h3>Avaliação</h3>
        @if($rateDone)
            <div>
                <h5>Você já avaliou esse serviço</h5>
            </div>
        @else
            <div>
                <h5>Avaliar {{Auth()->user()->id === $providedService->client_id ? "Prestador de Serviço" : "Cliente"}}</h5>
                <form action="{{route('user.rate.request', $providedService->id)}}" class="form" method="POST">
                    {!! csrf_field() !!}
                    <div>
                        <label for="rate">
                            Nota que você daria para o {{Auth()->user()->id === $providedService->client_id ? "prestador de serviço" : "cliente"}} em relação ao serviço realizado?
                        </label>
                        <div class="container">
                            <div class="row">
                                <label>
                                    <select name="rate" id="rate" class="form-control left">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </label>
                                <label>
                                    <button type="submit" class="btn btn-primary right">Avaliar</button>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        </div>
    </div>
@stop