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
                    <div class="clientereveal col-md-12">
                        <h3>Procure</h3>
                        <hr class="star-second">

                        <div class="txt-procure">
                            <div class="col-md-6">
                                <img src="images/procure.jpg" alt="procurar serviço" class="img-responsive">
                            </div>
                            <div class="col-md-6">
                                <p>Encontrar o Profissional que você precisa é bem simples,
                                basta digitar o qual serviço você deseja.</p>
                            </div>
                        </div>
                    </div>
                    <div class="clientereveal col-md-12">
                        <h3>Escolha</h3>
                        <hr class="star-second">
                        
                        <div class="txt-escolha">
                            <div class="col-md-6">
                                <p>Após procurar o que precisa, será exibido uma lista de profissionais
                                    mais próximos a sua região, você poderá ver o perfil de cada um 
                                    onde consta as habilidades e as avaliações dos serviços do prestador.
                                    Basta apenas escolher qual profissional você acha que atende melhor as 
                                    suas necessidades.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <img src="images/escolha2.jpg" alt="escolher serviço" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="clientereveal col-md-12">
                        <h3>Contrate</h3>
                        <hr class="star-second">

                        <div class="txt-contrate">
                            <div class="col-md-6">
                                <img src="images/contrate2.jpg" alt="contratar serviço" class="img-responsive">
                            </div>
                            <div class="col-md-6">
                                <p>Escolhido o profissional, basta apenas solicitar o serviço,
                                    negociar o preço, determinar um prazo e após a realização do serviço
                                    avaliar o profissional. Simples!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('portal.sections.how.how-works')

<section class="join-us" style="background: url(images/joinus.jpg) center center/100% no-repeat">
    <h2>Junte-se a nós</h2>
    <h3>O que você está esperando?</h3>
    <a href="{{ route('register') }}"><button>Comece aqui</button></a>
</section>

@include('templates.sections.footer')