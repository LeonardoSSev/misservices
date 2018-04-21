@extends('templates.temp')
    <div class="row">
        <div class="col-lg-3">
            @include('painel.templates.menu-admin')
        </div>
        <div class="col-lg-9">
            @yield('content-admin')
        </div>
    </div>
</div>
@include('templates.sections.footer')