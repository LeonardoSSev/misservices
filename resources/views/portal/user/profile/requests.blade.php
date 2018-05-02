@extends('templates.temp')
@include('templates.sections.header')

<div class="container" style="padding-top: 15%;">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div style="border: 2px solid black; border-radius: 5px; margin: 5px;">
        @if($servicesRequests)
            @foreach($servicesRequests as $request)
                <p>{{$request->userName}}</p>
                <p>{{$request->serviceName}}</p>
                <p>{{$request->date}}</p>
                <a href="{{route('user.request.accept', $request->id)}}">
                    <button>Aprovar</button>
                </a>
                <a href="{{route('user.request.refuse', $request->id)}}">
                    <button>Recusar</button>
                </a>
            @endforeach
        @else
        
    </div>

</div>

@include('templates.sections.footer')