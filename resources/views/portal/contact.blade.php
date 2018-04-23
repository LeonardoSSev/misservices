@extends('templates.temp')
@section('content')
@include('templates.sections.header')

<div class="contact-page">
@include('portal.sections.contact.contact-form')
</div>

@include('templates.sections.footer')
@stop