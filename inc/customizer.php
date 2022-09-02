<?php

/**
 * YourSpace Customizer Setup
 *
 * @package YourSpace
 */

/****************************************************************

    Sanitize Code
    
****************************************************************/

//script input sanitization function
function yourspace_sanitize_js_code($input){
    return base64_encode($input);
}


//output escape function    
function yourspace_escape_js_output($input){
    return esc_textarea( base64_decode($input) );
}

/****************************************************************

    Customizer Inputs
    
****************************************************************/

function yourspace_customizer( $wp_customize ) {
    
    /****************************************************************

        Colors

    ****************************************************************/
    
    // Dark Blue
    $wp_customize->add_setting('blue_dark', array('default' => '#062fa5'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blue_dark', 
        array(
            'label'     => __( 'Dark Blue', 'yourspace' ),
            'section'   => 'colors',
            'settings'  => 'blue_dark',
        ) ) 
    );
    
    // Medium Blue 1
    $wp_customize->add_setting('blue_mid', array('default' => '#6699ce'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blue_mid', 
        array(
            'label'     => __( 'Medium Blue 1', 'yourspace' ),
            'section'   => 'colors',
            'settings'  => 'blue_mid',
        ) ) 
    );
    
    // Medium Blue 1
    $wp_customize->add_setting('blue_mid_alt', array('default' => '#afd0ef'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blue_mid_alt', 
        array(
            'label'     => __( 'Medium Blue 2', 'yourspace' ),
            'section'   => 'colors',
            'settings'  => 'blue_mid_alt',
        ) ) 
    );
    
    // Light Blue
    $wp_customize->add_setting('blue_light', array('default' => '#d5e7fb'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blue_light', 
        array(
            'label'     => __( 'Light Blue', 'yourspace' ),
            'section'   => 'colors',
            'settings'  => 'blue_light',
        ) ) 
    );
    
    // Dark Orange
    $wp_customize->add_setting('orange_dark', array('default' => '#df7a36'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'orange_dark', 
        array(
            'label'     => __( 'Dark Orange', 'yourspace' ),
            'section'   => 'colors',
            'settings'  => 'orange_dark',
        ) ) 
    );
    
    // Medium Orange
    $wp_customize->add_setting('orange_mid', array('default' => '#F3983E'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'orange_mid', 
        array(
            'label'     => __( 'Dark Orange 2', 'yourspace' ),
            'section'   => 'colors',
            'settings'  => 'orange_mid',
        ) ) 
    );
    
    // Light Orange
    $wp_customize->add_setting('orange_light', array('default' => '#ffcc95'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'orange_light', 
        array(
            'label'     => __( 'Light Orange', 'yourspace' ),
            'section'   => 'colors',
            'settings'  => 'orange_light',
        ) ) 
    );
    
    /****************************************************************

        Profile

    ****************************************************************/
    
    // Add Profile
    $wp_customize->add_section('yourspace_profile', array(
        'title'         => __( 'Profile Info', 'yourspace' ),
        'description'   => __( 'Customize the profile section.', 'yourspace' ),
        'priority'      => 110,
    ));
    
    // Profile Checkbox
    $wp_customize->add_setting( 'profile_display', array(
        'default'   => 1
    ));
    $wp_customize->add_control( 'profile_display', array(
        'type'          => 'checkbox',
        'section'       => 'yourspace_profile',
        'label'         => __( 'Display Profile Info?', 'yourspace' ),
        'description'   => __( 'Uncheck to remove profile section.' ),
    ) );
    
    // Profile Title
    $wp_customize->add_setting( 'profile_title', array(
        'default'               => get_bloginfo('title'),
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'profile_title', array(
        'type'          => 'text',
        'label'         => __( 'Profile Section Title', 'yourspace' ),
        'section'       => 'yourspace_profile',
        'settings'      => 'profile_title',
    ) );


    // Profile Image
    $wp_customize->add_setting('profile_photo');
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'profile_photo',
        array(
            'label'     => __( 'Profile Image', 'yourspace' ),
            'section'   => 'yourspace_profile',
            'settings'  => 'profile_photo',
            'flex_width'  => true,
            'flex_height' => true,
            'width'     => 150,
            'height'    => 200
            ) 
    ) );
    
    // Profile Text
    $wp_customize->add_setting( 'profile_text', array(
        'default'               => '',
        'sanitize_callback'     => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'profile_text', array(
        'type'          => 'textarea',
        'label'         => __( 'Profile Text', 'yourspace' ),
        'description' => __( 'Favorite quote? Age? Gender? Location?', 'yourspace' ),
        'section'       => 'yourspace_profile',
        'settings'      => 'profile_text',
    ) );
    
    /****************************************************************

        Blurbs

    ****************************************************************/
    
    // Add Blurbs Section
    $wp_customize->add_section('yourspace_blurbs', array(
        'title'         => __( 'Blurbs', 'yourspace' ),
        'description'   => __( 'Customize the blurbs section.', 'yourspace' ),
        'priority'      => 110,
    ));
    
    // Blurbs Title
    $wp_customize->add_setting( 'blurbs_title', array(
        'default'               => 'YourSpace\'s Blurbs',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'blurbs_title', array(
        'type'          => 'text',
        'label'         => __( 'Blurbs Title', 'yourspace' ),
        'section'       => 'yourspace_blurbs',
        'settings'      => 'blurbs_title',
    ) );
    
    /****************************************************************

        Tag Manager / Code Inputs

    ****************************************************************/
    
    // Add Home Sections Panel
    $wp_customize->add_section('yourspace_snippets', array(
        'title'         => __( 'Head/Body Snippets', 'yourspace' ),
        'description'   => __( 'Areas for snippets like Google Tag Manager.', 'yourspace' ),
        'priority'      => 110,
    ));
    
    
    // Head Code
    $wp_customize->add_setting( 'head_code',
        array(          
            'sanitize_callback' => 'yourspace_sanitize_js_code', 
            'sanitize_js_callback' => 'yourspace_escape_js_output' 
        )
    );
    $wp_customize->add_control( 'head_code', array(
        'type'        => 'textarea',
        'section'     => 'yourspace_snippets', 
        'label'       => __( 'Head Code' ),
        'description' => __( 'Code input here will print in the head section.', 'yourspace' ),
        'settings'      => 'head_code',
    ) );
    
    // Body Code
    $wp_customize->add_setting( 'body_code',
        array(          
            'sanitize_callback' => 'yourspace_sanitize_js_code', 
            'sanitize_js_callback' => 'yourspace_escape_js_output' 
        )
    );
    $wp_customize->add_control( 'body_code', array(
        'type'        => 'textarea',
        'section'     => 'yourspace_snippets',
        'label'       => __( 'Body Code' ),
        'description' => __( 'Code input here will print just after the body tag.', 'yourspace' ),
        'settings'      => 'body_code',
    ) );
 
} add_action( 'customize_register', 'yourspace_customizer' );

