<?php
/*
 * Portfolio image srcset
 */

 function m2eg_portfolio_srcset( $post_id ) {

     $id = get_post_thumbnail_id( $post_id );
     $srcset;

     $srcset_listing   = wp_get_attachment_image_src( $id, 'portfolio-listing' )[0] . ' 1x, ';
     $srcset_listing  .= wp_get_attachment_image_src( $id, 'portfolio-listing-2x' )[0] . ' 2x, ';

     // $srcset = [
     //     'listing'  => $srcset_listing
     // ];


     return $srcset_listing;

 }
