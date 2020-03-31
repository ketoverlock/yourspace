jQuery(function($) {
    
    /*function stickyHeader() {
        
        var scrollHeight = $('.top-bar').outerHeight();

        if ($(window).scrollTop() > scrollHeight && $(window).width() > 1024) {
            $('.site-header').addClass('site-header--sticky');
        } else {
            $('.site-header').removeClass('site-header--sticky');
        }
        
    }*/
    
    function mobileToggle() {
        
        $('.mobile-nav .menu-item-has-children').append('<button class="submenu-toggle"><i class="fas fa-angle-down" aria-hidden="true"></i></button>');
        

        $('.menu-toggle').click(function() {
            $('.site-container').addClass('fixed');
            $('.mobile-nav').addClass('mobile-nav--visible');
        });
        
        $('.menu-close').click(function() {
            $('.site-container').removeClass('fixed');
            $('.mobile-nav').removeClass('mobile-nav--visible');
        });
        
        $(document).on('click', '.submenu-toggle', function() {
            $(this).siblings('.sub-menu').slideToggle();
            $(this).toggleClass('rotated');
        });
        
    }
    
    function windowFix() {

        if ($(window).width() < 1024 && $('.mobile-nav').hasClass('mobile-nav--visible')) {
            $('.site-container').addClass('fixed');
        } else {
            $('.site-container').removeClass('fixed');
        }
        
    }
    
    $(document).ready(function() {
        mobileToggle();
    });
    
    $(window).resize(function() {
        windowFix();
    });
    
    $(window).scroll(function() {
        stickyHeader();
        contentFade();
    });
    
});