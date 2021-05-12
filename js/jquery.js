/*Menu effeito*/
$(window).scroll(function(event){

    const efeito = window.pageYOffset;
    const posicao = 200;
    if (efeito > posicao){
        $(".nav_contato").addClass('actived');
        $("#logo").addClass('actived');
        $(".menu_box").addClass('actived');
        $(".Menu_Mobile").addClass('actived');
    }else{
        $(".nav_contato").removeClass('actived');
        $("#logo").removeClass('actived');
        $(".menu_box").removeClass('actived');
        $(".menu_box").removeClass('actived');
    }
});

/*Menu escondido effeito*/
$(document).ready(function(){
    $('.Menu_Mobile').click(function(){
        $('.menu_box').toggleClass('act')
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

$(window).on('load', function () {
    $(".loader").fadeOut();
    $("#preloder").delay(200).fadeOut("slow");

    /*------------------
        Gallery filter
    --------------------*/
    $('.Itens_blog li').on('click', function () {
        $('.Itens_blog li').removeClass('active');
        $(this).addClass('active');
    });
    if ($('.Cards_Blog_Page').length > 0) {
        var containerEl = document.querySelector('.Cards_Blog_Page');
        var mixer = mixitup(containerEl);
    }
});