@extends('templates.temp')
@include('templates.sections.header')

@foreach ($services as $service)
    <div style="border: 2px black solid; boorder-radius: 5%; margin: 10%;">
        <p>{{$service->cat_name}}</p>
        <p>{{$service->name}}</p>
        <p>{{$service->description}}</p>
        <p>{{$service->user_id}}</p>
        <p>{{$service->user_name}}</p>
    </div>
@endforeach
@include('templates.sections.footer')