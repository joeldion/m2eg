<?php

$path = get_stylesheet_directory();

require_once( $path . '/inc/constants.php' );
require_once( $path . '/inc/enqueue.php' );
require_once( $path . '/inc/slider/slider.php' );
require_once( $path . '/inc/home-modules/home-modules-settings.php' );
require_once( $path . '/inc/contact/contact.php' );
require_once( $path . '/inc/jobs/jobs.php' );
require_once( $path . '/inc/portfolio/portfolio.php' );
require_once( $path . '/inc/team/team.php' );

// Add Theme Support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-selective-refresh-widgets' );
add_theme_support( 'starter-content' );
add_theme_support( 'menus' );

// Custom Image Sizes
function m2eg_custom_image_sizes() {

    //add_image_size( 'm2eg-banner', 1920, 670, true );
    //add_image_size( 'm2eg-banner-2x', 3840, 1340, true );
    add_image_size( 'm2eg-team-1x', 350, 500, true );
    add_filter( 'big_image_size_threshold', '__return_false' );

}
add_action( 'after_setup_theme', 'm2eg_custom_image_sizes' );

// function m2eg_remove_default_image_sizes() {
//     remove_image_size( 'thumbnail' );
//     remove_image_size( 'medium' );
//     remove_image_size( 'large' );
// }
// add_action( 'init', 'm2eg_remove_default_image_sizes' );

// Nav menus
register_nav_menus( [
    'main-menu'         => 'Menu principal',
    'main-menu-mobile'  => 'Menu principal (mobile)',
    ]
);

// Mobile menu custom items
function m2eg_mobile_menu_custom_items( $items, $args ) {

    if ( $args->theme_location == 'main-menu-mobile' ) {

        if ( current_user_can( 'administrator' ) ) {
            $items .= '<li class="menu-item"><a href="#">Espace client</a></li>';
        }
        
        if ( ( get_option( 'contact_info_facebook' ) !== '') ||  ( get_option( 'contact_info_instagram' ) !== '' ) ) :

            $facebook = esc_url( get_option( 'contact_info_facebook' ) );
            $instagram = esc_url( get_option( 'contact_info_instagram' ) );

            $items .= '<li class="menu-item social">';

                if ( $facebook !== '' ) {
                    $items .= '<a class="facebook" href="'.$facebook.'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
                }

                if ( $instagram !== '' ) {
                    $items .= '<a class="instagram" href="'.$instagram.'" target="_blank"><i class="fab fa-instagram"></i></a>';
                }

            $items .= '</li>';

        endif;

    }

    return $items;
}
add_filter( 'wp_nav_menu_items', 'm2eg_mobile_menu_custom_items', 10, 2 );

add_action( 'pre_amp_render_post', function( $post_id ) {
    global $post;
    $post = get_post( $post_id );
} );

// Disable Contact Form 7 auto P tags
add_filter('wpcf7_autop_or_not', '__return_false');

// Detect Internet Explorer 
function is_IE() {
    if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || preg_match('~Trident/7.0(; Touch)?; rv:11.0~',$_SERVER['HTTP_USER_AGENT'])) {
        return true;
    }
}
