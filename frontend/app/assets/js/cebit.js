$.main = {
    /*------------------------------------------------------------
      Show modal
    ------------------------------------------------------------*/
    showModal: function () {
        $('[data-popup-open]').on('click', function (e) {
            var target_popup = $(this).attr('data-popup-open');
            $('[data-popup="' + target_popup + '"]').fadeIn(150);
            $('body').css({
                'overflow': 'hidden'
            });
            e.preventDefault();
        })
        $('[data-popup-close]').on('click', function (e) {
            var target_popup = $(this).attr('data-popup-close');
            $('[data-popup="' + target_popup + '"]').fadeOut(150);
            $('.npopup-info__inner-form__mess .response.nsuccess').text('');
            $('body').css({
                'overflow': 'auto'
            });
            e.preventDefault();
        })
    },
    /*------------------------------------------------------------
    Show Back To Top
    ------------------------------------------------------------*/
    showBackToTop: function () {
        $(window).on('scroll', function () {
            var scroll = $(window).scrollTop(),
                element_backtotop = $('.nbtt');
            if (scroll >= 500) {
                element_backtotop.addClass('nshow');
            } else {
                element_backtotop.removeClass('nshow');
            }
        })
    },
    /*------------------------------------------------------------
    Back To Top
    ------------------------------------------------------------*/
    backToTop: function () {
        $(document).on('click', '.nbtt', function (e) {
            e.preventDefault();
            $('html,body').stop().animate({
                scrollTop: 0
            }, 1200);
        });
    }
};
$(function () {
    $.main.showBackToTop();
    $.main.backToTop();
    $.main.showModal();
});