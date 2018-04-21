@extends('templates.temp')
@include('templates.sections.header')


<h2 style="padding-top: 10%; padding-left: 10%;">Buscar por categorias</h2>
@foreach ($categories as $category)
    <div style="border: 2px black solid; boorder-radius: 5%; margin: 10%;">
        <p>{{$category->name}}</p>
        <p>{{$category->description}}</p>
        <a href="{{route('user.search.services', [$category->id])}}">Ver serviços sobre {{$category->name}}</a>
    </div>
@endforeach
{!! $categories->links() !!}

@include('templates.sections.footer')