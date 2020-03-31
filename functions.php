<?php
/**
 * YourSpace functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package YourSpace
 */


/****************************************************************

    Theme Setup
    
****************************************************************/

define( 'THEME_VERSION', '1.0.0' );

if ( ! function_exists( 'yourspace_setup' ) ) :

	function yourspace_setup() {
        
		// Translation Ready
		load_theme_textdomain( 'yourspace', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// WP Handles Title Tag
		add_theme_support( 'title-tag' );

		// Featured Images
		add_theme_support( 'post-thumbnails' );

		// Register nav menus
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'yourspace' ),
		) );

		// HTML 5 Output
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'yourspace_custom_background_args', array(
			'default-color' => 'E5E5E5',
			'default-image' => '',
		) ) );
        
	}
endif;
add_action( 'after_setup_theme', 'yourspace_setup' );

// Content Width
function yourspace_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yourspace_content_width', 640 );
}
add_action( 'after_setup_theme', 'yourspace_content_width', 0 );

/****************************************************************

    Enqueue Scripts & Styles
    
****************************************************************/

function yourspace_scripts() {

    wp_enqueue_style( 'ys-css', get_stylesheet_directory_uri() . '/main.css', array(), THEME_VERSION );
    
    wp_enqueue_script( 'ys-scripts', get_stylesheet_directory_uri() . '/js/min/ys-scripts.min.js', array( 'jquery' ), THEME_VERSION, true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yourspace_scripts' );

/****************************************************************

    Widget Areas
    
****************************************************************/

function yourspace_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'yourspace' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'yourspace' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'yourspace_widgets_init' );

/****************************************************************

    Custom Template Tags
    
****************************************************************/

require get_template_directory() . '/inc/template-tags.php';

/****************************************************************

   Jetpack
    
****************************************************************/

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/****************************************************************

   WooCommerce
    
****************************************************************/

if ( class_exists( 'WooCommerce' ) ) {
}

/****************************************************************

   Customizer Setup & Output
    
****************************************************************/

require get_template_directory() . '/inc/customizer.php';

/****************************************************************

   Misc.
    
****************************************************************/

// Custom Body Classes
function yourspace_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'yourspace_body_classes' );

// Add a pingback url auto-discovery header for single posts, pages, or attachments.
function yourspace_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'yourspace_pingback_header' );

// Filter Archive Titles
function yourspace_archive_title( $title ) {
    
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'yourspace_archive_title' );

// Re-Arrange Comment Fields
function yourspace_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
} add_filter( 'comment_form_fields', 'yourspace_move_comment_field_to_bottom' );
