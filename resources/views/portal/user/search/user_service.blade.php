@extends('templates.temp')
@include('templates.sections.header')
<div class="service-detail">
    <div class="container">
        <div class="col-lg-4" id="perfil-info">
            <div class="row primary-info">
                <figure class="box-img-perfil">
                    @if( !empty($user[0]->image) )
                        <img src="{{ $user[0]->image }}" alt="{{auth()->user()->name}}" class="img-perfil img-responsive">
                    @else
                        <img src="{{ asset('images/logo-misservices.png') }}" alt="perfil" class="img-perfil img-responsive">
                    @endif
                </figure>
                <span class="name-user">{{ $user[0]->name }}</span>
            </div>
            <ul>
                <li><b>Estado:</b> {{ $user[0]->state }}</li>
                <li><b>Cidade:</b> {{ $user[0]->city }}</li>
                <li><b>Sobre mim:</b> {{ $user[0]->about }}</li>
            </ul>
        </div>
        <div class="col-lg-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="block">
                <h3>Dados sobre o Provedor de Serviços:</h3>
                <div class="box">
                    @if($averageRate != 0)
                        <p class="left">Média de avaliações: {{$averageRate}}/5</p>
                        <p class="right">Quantidade de serviços realizados: </p>
                    @else
                        <p>Esse usuário não realizou ou concluiu esse serviço ainda!</p>
                    @endif
                </div>
                <div class="box">
                    @if( !empty($user[0]->abilities) )
                    <p class="title">Habilidades:</p>
                        @foreach($user as $item)
                            <p>{{ $item->abilities }}</p>
                        @endforeach
                    @else
                        <p>Este usuário não tem habilidades cadastradas</p>
                    @endif
                </div>
                @cannot('Admin')
                    <form action="{{route('user.request.service', [$service->id])}}" class="form" method="POST">
                        {{ csrf_field() }}
                        <div>
                            <button type="submit" class="btn btn-form right">Solicitar Serviço</button>
                        </div>
                    </form>
                @endcannot
            </div>
            <div class="block">
                <h3>Últimos comentários:</h3>
                @if(count($serviceDetails) > 0)
                    @foreach($serviceDetails as $detail)
                    <div class="box">
                        <p>{{$detail->userId}} - {{$detail->userName}}</p>
                        <p>{{$detail->rate}}</p>
                        <p>{{$detail->comment}}</p>
                        <p>R${{$detail->price}}</p>
                    </div>
                    @endforeach
                @else
                    <div class="box">
                        <p>Esse usuário não realizou ou concluiu esse serviço ainda!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@include('templates.sections.footer')