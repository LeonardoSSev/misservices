@extends('templates.temp')
@include('templates.sections.header')

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="images/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">MisServices</span>
                    <hr class="star-light">
                    <span class="skills">Encontre aqui o serviço que você precisa</span>
                    <div class="buscar">
                        <input type="text" class="txt_buscar" name="servico" id="servico">
                        <button><i class="fa fa-search"></i></button>
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