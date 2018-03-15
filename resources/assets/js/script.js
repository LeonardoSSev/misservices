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


//Como Funciona
$('.cliente').click(function(){
    $('.prestador').removeClass('.active');
    this.addClass('.active');
});

$('.prestador').click(function(){
    $('.cliente').removeClass('.active');
    this.addClass('.active');
});
