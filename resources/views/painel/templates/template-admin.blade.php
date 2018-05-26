@extends('templates.temp')
@section('content')
    <div class="container">
        <div class="col-lg-3">
            @include('painel.templates.menu-admin')
        </div>
        <div class="col-lg-9">
            <div  id="admin-table">
                @yield('content-admin')
            </div>
        </div>
    </div>
    <div class="footer-admin">
        @include('templates.sections.footer')
    </div>
@stop
