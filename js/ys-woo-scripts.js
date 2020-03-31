jQuery(function($) {

    $(".cat-parent").prepend('<button class="woocommerce-categories-toggle"><i class="fas fa-angle-down" aria-hidden="true"></i><span class="screen-reader-text">Toggle Subcategories</span></button>');
    
    $(".woocommerce-categories-toggle").click(function(){
        $(this).siblings("ul").slideToggle("slow");
        $(this).children('.fas').toggleClass("rotated");
    });
    
});