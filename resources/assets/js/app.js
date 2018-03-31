/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Rx.DOM.ready().subscribe(() => {
    const app = new Vue({
        el: '#app'
    });
    require('./bell/parallax.js');
    require('./bell/navbar.js');

});

$(document).ready(() => {
    // Tooltip & popovers
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
    // Stick the header at top on scroll
    $("#header").sticky({ topSpacing: 0, zIndex: '50' });
    // Counting numbers
    $('.counterup').counterUp({
        delay: 10,
        time: 1000
    });
    //Scroll Top link
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrolltop').fadeIn();
        } else {
            $('.scrolltop').fadeOut();
        }
    });
    // Background image via data tag
    $('[data-block-bg-img]').each(function() {
        // @todo - invoke backstretch plugin if multiple images
        var $this = $(this),
            bgImg = $this.data('block-bg-img');

        $this.css('backgroundImage', 'url(' + bgImg + ')').addClass('block-bg-img');
    });


    $('.scrolltop, #logo a').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1000, 'easeInOutExpo');
        return false;
    });
    console.clear();
})