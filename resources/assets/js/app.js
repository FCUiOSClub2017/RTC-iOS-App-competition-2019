/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("navbar", require("./components/navbar.vue"));

Rx.DOM.ready().subscribe(() => {
    const app = new Vue({
        el: "#app"
    });
    $('[href="#"]').click(() => { event.preventDefault(); return false; });
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 350, 'easeInOutExpo');
                return false;
            }
        }
    });
    // Tooltip & popovers
    $("[data-toggle=\"tooltip\"]").tooltip();
    $("[data-toggle=\"popover\"]").popover();
    // Stick the header at top on scroll
    $("#header").sticky({ topSpacing: 0, zIndex: "50" });
    // Counting numbers
    $(".counterup").counterUp({
        delay: 10,
        time: 1000
    });
    //Scroll Top link
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $(".scrolltop").fadeIn();
        } else {
            $(".scrolltop").fadeOut();
        }
    });

    $(".scrolltop, #logo a").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1000, "easeInOutExpo");
        return false;
    });

    $("[data-bg-img]").each(function() {
        var $this = $(this),
            imagePath = $this.data("bg-img") || null;
        if (imagePath !== null) {
            $this.css("backgroundImage", "url(" + imagePath + ")");
        }
    });
    $.stellar.positionProperty.parallaxPosition = {
        setTop: function(el, t) {
            var r = el.data("vpos") || null;
            r !== null ? el.css(r) : el.css("top", t);
        },
        setLeft: function(el, t) {
            var r = el.data("hpos") || null;
            r !== null ? $.each(r, function(t, n) { el.css(t, n); }) : el.css("left", t);
        }
    };
    $.stellar({
        responsive: true,
        positionProperty: "parallaxPosition",
    });
});