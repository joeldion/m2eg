<?php
/*
 * Enqueue
*/

add_action( 'wp_enqueue_scripts', 'm2eg_styles' );
add_action( 'wp_enqueue_scripts', 'm2eg_scripts' );
add_action( 'admin_enqueue_scripts', 'm2eg_admin_styles' );
add_action( 'admin_enqueue_scripts', 'm2eg_admin_scripts' );
add_action( 'admin_enqueue_scripts', 'm2eg_portfolio_save' );

function m2eg_styles() {

    // Theme main style
    wp_enqueue_style(
        'm2eg',
        get_stylesheet_directory_uri() . '/style.css',
        [],
        time()
    );

    // Frontend Admin Style
    if ( current_user_can( 'administrator' ) ) {

        wp_enqueue_style(
            'm2eg-admin-frontend',
            get_stylesheet_directory_uri() . '/assets/css/m2eg-admin-frontend.css',
            [],
            time()
        );

    }

    // Font Awesome
    wp_enqueue_style(
        'fontawesome',
        get_stylesheet_directory_uri() . '/assets/css/fontawesome/all.min.css',
        [],
        '5.15.2'
    );

}

function m2eg_scripts() {

    wp_enqueue_script(
        'm2eg',
        get_stylesheet_directory_uri() . '/assets/js/m2eg-script.js',
        ['jquery'],
        time(),
        true
    );

}

function m2eg_admin_styles() {

    wp_enqueue_style(
        'm2eg-admin',
        get_stylesheet_directory_uri() . '/assets/css/m2eg-admin-style.css',
        [],
        time()
    );

}

function m2eg_admin_scripts() {

    wp_enqueue_script(
        'm2eg-admin',
        get_stylesheet_directory_uri() . '/assets/js/m2eg-admin-script.js',
        ['jquery'],
        time(),
        true
    );

}

// Portfolio save
function m2eg_portfolio_save( $hook ) {

    global $post;
    
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
    
        if ( 'portfolio' === $post->post_type ) {
        
            wp_enqueue_script( 
                'custom', 
                get_stylesheet_directory_uri() . '/assets/js/m2eg-portfolio-save.js',
                ['jquery'],
                time(),
                true
            );
        
        }
    
       }
    
}