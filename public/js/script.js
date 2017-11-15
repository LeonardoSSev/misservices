/* MENU MOBILE FIRST */
$(".btn-menu").click(function(){
      $(".menu").show();
      $(".menu-admin").show();
    });
$(".btn-close").click(function(){
      $(".menu").hide();
      $(".menu-admin").hide();
});

/* PAINEL ADMINISTRADOR */
$(".excluir").click(function(){
    $(".confirmar").show();
});
$(".cancelar").click(function(){
    $(".confirmar").hide();     
});

$(function hideLoader(){
    $('.loading').hide().delay(3000);
});