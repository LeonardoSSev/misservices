@extends('templates.temp')
@include('templates.sections.header')

<section id="como-funciona">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Como Funciona</h2>
                <hr class="star-light">
            </div>
            <div class="txt-intro">
                <p>É muito simples e eficaz utilizar o <span>MisServices</span>!</p>
                <p>Entenda aqui como é fácil você achar quem precisa e ser achado, se quiser ;)</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 col-sm-offset-3 col-md-offset-2 col-lg-offset-2 quadros">
                <button class="cliente col-xs-5 col-sm-5 col-md-3 col-md-offset-2 active">
                    <p>Cliente</p>
                </button>
                <button class="prestador col-xs-5 col-sm-5 col-md-3 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                    <p>Profissional</p>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="slider">
                <div class="slide">
                    <div class="col-md-12">
                        <h3>Procure</h3>
                        <hr class="star-second">

                        <div class="txt-procure">
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3>Escolha</h3>
                        <hr class="star-second">
                        
                        <div class="txt-escolha">
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3>Contrate</h3>
                        <hr class="star-second">

                        <div class="txt-contrate">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('portal.sections.how.how-works')

<section class="join-us">
    <h2>Junte-se a nós</h2>
    <h3>O que você está esperando?</h3>
    <a href="{{ route('register') }}"><button>Comece aqui</button></a>
</section>

@include('templates.sections.footer')