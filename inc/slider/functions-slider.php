<?php
/*
 * Slider: Functions
 */

// Show Slider
function m2eg_get_slider() {

    $args = [
        'post_type'     =>  'slide',
        'post_status'   =>  'publish',
        'orderby'       =>  'date',
        'order'         =>  'DESC'
    ];

    $slides = new WP_Query( $args );
    $slide_count = 0;

    ob_start();

    ?>

    <div class="slider">

        <?php while ( $slides->have_posts() ): $slides->the_post(); ?>

            <?php
                if ( has_post_thumbnail( get_the_ID() ) ) {
                    $gradient = 'linear-gradient(to right, rgba(17, 31, 58, .8), rgba(17, 31, 58, .8))';
                    $bg_image = 'style="background-image: ' . $gradient . ', url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ')"';
                }
            ?>

            <div class="slide slide-<?php echo $slide_count; ?>" <?php echo $bg_image; ?>>

                <div class="slide-caption">
                    <h3 class="slide-title"><?php the_title(); ?></h3>
                    <h4 class="slide-subtitle"><?php esc_html_e( get_post_meta( get_the_ID(), '_slide_subtitle', true ) ); ?></h4>
                    <div class="btn-wrapper">
                        <a class="btn blue" href="<?php esc_attr_e( get_post_meta( get_the_ID(), '_slide_link', true ) ); ?>">
                            <?php esc_html_e( get_post_meta( get_the_ID(), '_slide_btn_text', true ) ); ?>
                        </a>
                    </div>                    
                </div>

            </div>

            <?php $slide_count++; ?>

        <?php endwhile; ?>

    </div>

    <?php

    return ob_get_clean();

}
