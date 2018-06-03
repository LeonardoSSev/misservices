@extends('templates.temp')
@section('content')
@include('templates.sections.header')

<div class="contact-page">
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
@include('portal.sections.contact.contact-form')
</div>

@include('templates.sections.footer')
@stop