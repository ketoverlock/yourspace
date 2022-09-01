jQuery(function($) {
    
    function mobileToggle() {
        
        $('.mobile-navigation .menu-item-has-children').append('<button class="submenu-toggle"><i class="fas fa-angle-down" aria-hidden="true"></i></button>');
        

        $('.menu-toggle').click(function() {
            $('.site').addClass('fixed');
            $('.mobile-navigation').addClass('mobile-navigation--visible');
            $('.menu-close').focus();
        });
        
        $('.menu-close').click(function() {
            $('.site').removeClass('fixed');
            $('.mobile-navigation').removeClass('mobile-navigation--visible');
            $('.menu-toggle').focus();
        });
        
        $(document).on('click', '.submenu-toggle', function() {
            $(this).siblings('.sub-menu').slideToggle();
            $(this).toggleClass('rotated');
            $(this).siblings('.sub-menu').find('li:first-of-type > a').focus();
        });
        
    }
    
    function windowFix() {

        if ($(window).width() < 1024 && $('.mobile-navigation').hasClass('mobile-navigation--visible')) {
            $('.site').addClass('fixed');
        } else {
            $('.site').removeClass('fixed');
        }
        
    }
    
    $(document).ready(function() {
        mobileToggle();
    });
    
    $(window).resize(function() {
        windowFix();
    });
    
});