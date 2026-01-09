<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Header -->
    <header class="site-header">
        <div class="container header-inner">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                <?php 
                // Check if we have a logo image, otherwise text
                // For now, hardcoding the existing logo logic or fallback
                ?>
                <img src="<?php echo get_template_directory_uri(); ?>/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="site-logo">
            </a>
            
            <nav class="nav-links">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'fallback_cb'    => false, // Fallback to nothing if no menu assigned
                ) );
                ?>
                <!-- Hardcoded Subscribe for now as it's a button -->
                <a href="#" class="btn-subscribe">Subscribe</a>
            </nav>
        </div>
    </header>
