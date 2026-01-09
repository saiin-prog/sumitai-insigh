<?php
function sumitai_v2_setup() {
    // Add support for block styles
    add_theme_support( 'wp-block-styles' );

    // Enqueue editor styles
    add_editor_style( 'style.css' );
    
    // Register menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'sumitai-v2' ),
    ) );
    
    // Add support for featured images
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'sumitai_v2_setup' );

function sumitai_v2_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'sumitai-v2-style', get_stylesheet_uri() );
    
    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'sumitai_v2_scripts' );
?>
