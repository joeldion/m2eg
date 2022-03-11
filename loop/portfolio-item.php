<?php
/*
 * Loop: Portfolio item
 */

$id = get_the_ID();
$date = strtotime( get_post_meta( $id, '_portfolio_date', true ) );
$images = get_post_meta( $id, '_portfolio_images', true );
$images_list = explode(',', $images);


?>
<div class="portfolio-item" id="portfolio-image-<?php echo $id; ?>">

    <div class="portfolio-image">
        <img src="<?php echo get_the_post_thumbnail_url( $id, 'portfolio-listing' ) ?>" alt="<?php echo get_the_title(); ?>" srcset="<?php echo m2eg_portfolio_srcset( $id ); ?>"
        data-imgfull="<?php echo get_the_post_thumbnail_url( $id, 'full' ); ?>" data-parent="#portfolio-image-<?php echo $id; ?>">
    </div>
    
    <?php if ( !empty( $date ) ): ?>
        <?php /*
            <p class="portfolio-date">
                <?php echo date_i18n( 'F Y', $date ); ?>
            </p>
            */ ?>
    <?php endif; ?>

    <?php 
        if ( !empty( $images_list ) ):

            foreach( $images_list as $image_id ):               
                $image_medium = str_replace( get_site_url(), '', wp_get_attachment_image_url( $image_id, 'medium' ) );
                $image_large = str_replace( get_site_url(), '', wp_get_attachment_image_url( $image_id, 'large' ) );
                $image_full = str_replace( get_site_url(), '', wp_get_attachment_image_url( $image_id, 'full' ) );
                ?>
                    <input type="hidden" class="portfolio-gallery" 
                        data-imgid="<?php echo $image_id; ?>"                         
                        data-imglarge="<?php echo $image_large; ?>" 
                        data-imgfull="<?php echo $image_full; ?>">
                <?php
            endforeach;

        endif;
    ?>
    

</div>
