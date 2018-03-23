$(document).ready(function(){

    // Mascaras Cadastre-se
    $('#telephone').mask('(00)0000-0000');
    $('#celphone').mask('(00)00000-0000');
    $('#cpf').mask('000.000.000-00');
    $('#zipcode').mask('00000-000');

    // Index
    $('.slider.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsive:{
            0:{
                items: 1
            },

            1200:{
                items: 3
            }
        },
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true
    });

<<<<<<< HEAD
    // Mascaras Cadastre-se
    $('#telephone').mask('(00)0000-0000');
    $('#cellphone').mask('(00)00000-0000');
    $('#cpf').mask('000.000.000-00');
    $('#zipcode').mask('00000-000');

=======
>>>>>>> 23ac3fdb5d6dfadff15b6346bbcfc74304a02885
    //Como Funciona
    $('.cliente').click(function(){
        $('.prestador').removeClass('active');
        $('.cliente').addClass('active');
    });

    $('.prestador').click(function(){
        $('.cliente').removeClass('active');
        $('.prestador').addClass('active');
    });

});