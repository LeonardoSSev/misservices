@extends('templates.temp')
@section('content')
@include('templates.sections.header')

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="secao-intro-home">
                <img class="img-responsive img-home-principal" src="images/profile.png" alt="misservices">
                <div class="intro-text">
                    <span class="name">MisServices</span>
                    <hr class="star-light">
                    <span class="skills">Encontre aqui o serviço que você precisa</span>
                    <div class="buscar">
                        <form action=" @route( search.service ) " method="GET">
                            <input type="text" class="txt_buscar" name="service" id="servico">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@include('portal.sections.home.last-services')
@include('portal.sections.how.how-works')
@include('portal.sections.contact.contact-form')
@include('templates.sections.footer')
@stop