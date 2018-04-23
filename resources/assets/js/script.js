/* $(document).ready(function(){

    // Index
    $('#about .slider.owl-carousel').owlCarousel({
        loop:true,
        margin:30,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items: 1
            },

            1200:{
                items: 3
            }
        }
    });

    // Mascaras Cadastre-se
    $('#telephone').mask('(00)0000-0000');
    $('#cellphone').mask('(00)00000-0000');
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


    //Scroll Reveal
    window.sr = ScrollReveal();
    sr.reveal('.clientereveal', { 
        duration: 1000,
        origin: 'right' 
    });

});

function removeMasks(){
    $('#telephone').unmask();
    $('#cellphone').unmask();
    $('#cpf').unmask();
    $('#zipcode').unmask();
} */