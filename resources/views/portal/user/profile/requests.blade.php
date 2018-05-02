@extends('templates.temp')
@include('templates.sections.header')

<div class="container" style="padding-top: 15%;">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if(count($servicesRequests) > 0)
        @foreach($servicesRequests as $request)
            <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
                <p>{{$request->userName}}</p>
                <p>{{$request->serviceName}}</p>
                <p>{{$request->date}}</p>
                <a href="{{route('user.request.accept', $request->id)}}">
                    <button>Aprovar</button>
                </a>
                <a href="{{route('user.request.refuse', $request->id)}}">
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

@include('templates.sections.footer')