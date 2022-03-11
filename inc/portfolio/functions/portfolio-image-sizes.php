<?php
/*
 * Portfolio Image Sizes
 */

function m2eg_portfolio_image_sizes() {

    add_image_size( 'portfolio-listing', 510, 360, true );
    add_image_size( 'portfolio-listing-2x', 1020, 720, true );

}
add_action( 'after_setup_theme', 'm2eg_portfolio_image_sizes' );
