$(document).ready(function(){

    // Index
    $('#about .slider.owl-carousel').owlCarousel({
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

    // Mascaras Cadastre-se
    $('#dddTelephone').mask('(00)0000-0000');
    $('#dddCellphone').mask('(00)00000-0000');
    $('#cpf').mask('000.000.000-00');
    $('#zipcode').mask('00000-000');

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