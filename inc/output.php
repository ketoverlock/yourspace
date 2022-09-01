<?php

/*******************************************************

    CSS Output

********************************************************/

function ys_customize_css() {

    $blue_dark = get_theme_mod('blue_dark');
    $blue_mid = get_theme_mod('blue_mid');
    $blue_mid_alt = get_theme_mod('blue_mid_alt');
    $blue_light = get_theme_mod('blue_light');
    $orange_dark = get_theme_mod('orange_dark');
    $orange_mid = get_theme_mod('orange_mid');
    $orange_light = get_theme_mod('orange_light'); ?>

    <style id="customizer-css" type="text/css">
        
        <?php if ($blue_dark) : ?>
        
        .site-header { background-color: <?php echo $blue_dark; ?>; } a,.sidebar li>strong { color: <?php echo $blue_dark; ?>; }
        
        <?php endif; ?>
        
        <?php if ($blue_mid) : ?>
        
        .sidebar .widget-title, .primary-navigation, .primary-navigation .menu .sub-menu, button, input[type="button"], input[type="reset"], input[type="submit"], .button, .more-link, .mobile-navigation { background-color: <?php echo $blue_mid; ?>; } .sidebar .widget, input, select, textarea, button, input[type="button"], input[type="reset"], input[type="submit"], .button, .more-link { border-color: <?php echo $blue_mid; ?>; }
        
        <?php endif; ?>
        
        <?php if ($blue_mid_alt): ?>
        
        .mobile-navigation .sub-menu, .sidebar li>strong { background-color: <?php echo $blue_mid_alt; ?>; }
        
        <?php endif; ?>
        
        <?php if ($blue_light) : ?>
        
        .sidebar li, blockquote { background-color: <?php echo $blue_light; ?>; }
        
        <?php endif; ?>
        
        <?php if ($orange_dark): ?>
        button:hover,button:focus,input[type="button"]:hover,input[type="button"]:focus,input[type="reset"]:hover,input[type="reset"]:focus,input[type="submit"]:hover,input[type="submit"]:focus,.button:hover,.button:focus,.more-link:hover,.more-link:focus { background-color: <?php echo $orange_dark; ?>; } button:hover,button:focus,input[type="button"]:hover,input[type="button"]:focus,input[type="reset"]:hover,input[type="reset"]:focus,input[type="submit"]:hover,input[type="submit"]:focus,.button:hover,.button:focus,.more-link:hover,.more-link:focus { border-color: <?php echo $orange_dark; ?>; } a:focus, a:hover, .required, .blurbs-title,.entry-title,.page-title,.comments-title,.comment-reply-title,.woocommerce-tabs h2,.related>h2, .blurbs-title a,.entry-title a,.page-title a,.comments-title a,.comment-reply-title a,.woocommerce-tabs h2 a,.related>h2 a, .entry-content h1,.entry-content h2,.entry-content h3,.entry-content h4,.entry-content h5,.entry-content h6,.blurbs-content h1,.blurbs-content h2,.blurbs-content h3,.blurbs-content h4,.blurbs-content h5,.blurbs-content h6 { color: <?php echo $orange_dark; ?>; }
        
        <?php endif; ?>
        
        <?php if ($orange_mid): ?>
        
        .comment-meta { background-color: <?php echo $orange_mid; ?>; }
        
        <?php endif; ?>
        
        <?php if ($orange_light): ?>
        
        .blurbs-title,.entry-title,.page-title,.comments-title,.comment-reply-title,.woocommerce-tabs h2,.related>h2, .comment-content { background-color: <?php echo $orange_light; ?>; } input:hover,input:focus,input:active,select:hover,select:focus,select:active,textarea:hover,textarea:focus,textarea:active { border-color: <?php echo $orange_light; ?>; } fieldset legend, .pagination .current { color: <?php echo $orange_light; ?>; }
        
        <?php endif; ?>
        
    </style>

<?php } add_action('wp_head', 'ys_customize_css');

/*******************************************************

    Code Snippets

********************************************************/

function ys_head() { 
    
    if (get_theme_mod('head_code')) :
    
        echo base64_decode(get_theme_mod('head_code'));
    
    endif;

} add_action('wp_head', 'ys_head', 5);

function ys_body(){

     if (get_theme_mod('body_code')) :
    
        echo base64_decode(get_theme_mod('body_code'));
    
    endif;

} add_action('wp_body_open', 'ys_body', 5);