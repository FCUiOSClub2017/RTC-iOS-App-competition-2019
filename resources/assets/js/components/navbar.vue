<template>
    <div ref="navRoot" id="nav-bar">
        <header id="header" style="background-image: url(images/table.png);background-size: cover;">
            <div class="container-fulid">
                <div class="row no-gutters px-3 justify-content-end">
                    <div id="logo" class="col col-auto">
                        <slot name="logo"></slot>
                    </div>
                    <div class="col">
                        <nav id="nav-menu-container" ref="navMenu">
                            <slot name="nav-content"></slot>
                        </nav>
                    </div>
                    <!-- #nav-menu-container -->
                    <nav class="col col-auto nav social-nav float-right d-none d-xl-inline">
                        <a href="http://www.fcu.edu.tw">
                            <img class="svg-inline--fa fa-w-12" src="/svg/fcu.svg" alt="FCU Official Website">
                        </a>
                        <a href="https://www.facebook.com/FCURTC"><i class="fab fa-apple"></i></a>
                        <a href="https://iosclub.tw">
                            <img class="svg-inline--fa fa-w-12" src="/svg/iosclub.svg" alt="FCU iOSClub Official Website">
                        </a>
                        <a href="mailto:rtc@fcu.edu.tw"><i class="fas fa-envelope"></i></a>
                    </nav>
                </div>
            </div>
        </header>
        <button type="button" id="mobile-nav-toggle"><i class="fas fa-bars"></i></button>
        <div id="mobile-body-overly"></div>
        <nav id="mobile-nav" ref="mobileNavMenu"></nav>
    </div>
</template>
<script>
export default {
    props: {
        mobile: {
            type: Boolean
        }
    },
    data() {
        return {
            mobileNav: '',
        }
    },
    created: function() {},
    mounted: function() {
        var mainNav = $(this.$refs.navMenu.innerHTML);
        var cloneMainNav = mainNav.clone();
        cloneMainNav.find('ul').hide()
        cloneMainNav.find('.fa-chevron-right').removeClass('fa-chevron-right').addClass('fa-chevron-down');
        this.$refs.mobileNavMenu.innerHTML = cloneMainNav.get(0).outerHTML;
        $('#mobile-nav .menu-has-children a').on('click', function(e) {
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

        $('#nav-bar a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
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
        // Initiate superfish on nav menu
        $('#nav-menu-container > ul').addClass('nav-menu').superfish();
    },
    methods: {}
}
</script>