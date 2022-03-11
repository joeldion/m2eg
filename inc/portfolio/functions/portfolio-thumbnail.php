<?php
/*
 * Loop: Portfolio Thumbnail
 */

function m2eg_get_portfolio_thumbnail() {

    $id = get_the_ID();
    $src = get_the_post_thumbnail_url( $id, 'portfolio-listing' );
    $alt = get_the_title();
    $srcset = m2eg_portfolio_srcset( $id );
    $imgfull = get_the_post_thumbnail_url( $id, 'full' );

    ob_start();
    ?>

    <img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" srcset="<?php echo $srcset; ?>" data-imgfull="<?php echo $imgfull; ?>">

    <?php

    echo ob_get_clean();

}

?>
