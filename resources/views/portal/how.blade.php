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
            <div class="quadros">
                <button class="cliente col-xs-5 active">
                    <p>Cliente</p>
                </button>
                <button class="prestador col-xs-5">
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

@include('templates.sections.footer')