<?php

/**
 * YourSpace Customizer Setup
 *
 * @package YourSpace
 */

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
        'title'         => __( 'Blueprint Profile', 'yourspace' ),
        'description'   => __( 'Customize the hero section.', 'yourspace' ),
        'priority'      => 110,
    ));
    
    // Profile Checkbox
    $wp_customize->add_setting( 'default_display', array(
        'default'   => 1
    ));
    $wp_customize->add_control( 'default_display', array(
        'type'          => 'checkbox',
        'section'       => 'yourspace_profile',
        'label'         => __( 'Display Profile Info?', 'yourspace' ),
        'description'   => __( 'Uncheck to remove profile section.' ),
    ) );
    
    // Default Profile Title
    $wp_customize->add_setting( 'default_title', array(
        'default'               => get_bloginfo('title'),
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'default_title', array(
        'type'          => 'text',
        'label'         => __( 'Default Profile Title', 'yourspace' ),
        'section'       => 'yourspace_profile',
        'settings'      => 'default_title',
        'description'   => __( 'Default profile title.' ),
    ) );


    // Profile Image
    $wp_customize->add_setting('default_photo');
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'default_photo',
        array(
            'label'     => __( 'Default Profile Image', 'yourspace' ),
            'section'   => 'yourspace_profile',
            'settings'  => 'default_photo',
            'description'   => __( 'The default profile image.' ),
            'width'     => 150,
            'height'    => 300
            ) 
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
    $wp_customize->add_setting( 'head_code' );
    $wp_customize->add_control( 'head_code', array(
        'type'        => 'textarea',
        'section'     => 'yourspace_snippets', 
        'label'       => __( 'Head Code' ),
        'description' => __( 'Code input here will print in the head section.' ),
        'settings'      => 'head_code',
    ) );
    
    // Body Code
    $wp_customize->add_setting( 'body_code' );
    $wp_customize->add_control( 'body_code', array(
        'type'        => 'textarea',
        'section'     => 'yourspace_snippets',
        'label'       => __( 'Body Code' ),
        'description' => __( 'Code input here will print just after the body tag.' ),
        'settings'      => 'body_code',
    ) );
 
} add_action( 'customize_register', 'yourspace_customizer' );

