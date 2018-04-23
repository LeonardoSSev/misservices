@extends('templates.temp')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            @include('painel.templates.menu-admin')
        </div>
        <div  id="admin-table" class="col-lg-9">
            @yield('content-admin')
        </div>
    </div>
@include('templates.sections.footer')
@stop