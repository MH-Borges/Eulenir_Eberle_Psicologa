/*Menu effeito*/
$(window).scroll(function(event){

    const efeito = window.pageYOffset;
    const posicao = 160;
    if (efeito > posicao){
        $(".nav_contato").addClass('actived');
        $("#logo").addClass('actived');
    }else{
        $(".nav_contato").removeClass('actived');
        $("#logo").removeClass('actived');
    }
});

console.log(event);
/*Menu escondido effeito*/
$(document).ready(function(){
    $('.menuHidden').click(function(){
        $('.nav-menu').toggleClass('act')
        $('.head').toggleClass('act')
    });
});
/*botão effeito*/
jQuery(document).ready(function(){

jQuery("#btn_UP").hide();
jQuery('#btn_UP').click(function () {
            jQuery('body,html').animate({
            scrollTop: 0
            }, 800);
        return false;
    });

jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 500) {
            jQuery('#btn_UP').fadeIn();
            } else {
            jQuery('#btn_UP').fadeOut();
            }
        });
});