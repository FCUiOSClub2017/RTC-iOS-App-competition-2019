$(function() {
    $('[href="#"]').click(()=>{event.preventDefault();return false;});
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 350, 'easeInOutExpo');

                if ($(this).parents('.nav-menu').length) {
                    $('.nav-menu .menu-active').removeClass('menu-active');
                    $(this).closest('li').addClass('menu-active');
                }
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle svg').toggleClass('fa-times fa-bars');
                    $('#mobile-body-overly').fadeOut();
                }
                return false;
            }
        }
    });
});

// Initiate superfish on nav menu
$('.nav-menu').superfish();

// Mobile Navigation
if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({ id: 'mobile-nav' });
    $mobile_nav.find('> ul').attr({ 'class': '', 'id': '' });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fas fa-bars"></i></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.fa-chevron-right').removeClass('fa-chevron-right').addClass('fa-chevron-down');

    $('.menu-has-children a').on('click', function(e) {
        $($(this).parent().find('svg').get(0)).next().toggleClass('menu-item-active');
        $($(this).parent().find('svg').get(0)).nextAll('ul').eq(0).slideToggle();
        $($(this).parent().find('svg').get(0)).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $('#mobile-nav-toggle').on('click', function(e) {
        $('body').toggleClass('mobile-nav-active');
        $('#mobile-nav-toggle svg').toggleClass('fa-times fa-bars');
        $('#mobile-body-overly').toggle();
    });

    $(document).click(function(e) {
        var container = $("#mobile-nav, #mobile-nav-toggle");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            if ($('body').hasClass('mobile-nav-active')) {
                $('body').removeClass('mobile-nav-active');
                $('#mobile-nav-toggle svg').toggleClass('fa-times fa-bars');
                $('#mobile-body-overly').fadeOut();
            }
        }
    });
} else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
}