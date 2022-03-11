<?php

/*
** Get Portfolio items
*/

function m2eg_portfolio_listing() {

    ob_start();

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $offset = $_POST[ 'portfolio-offset' ] !== null ? $_POST[ 'portfolio-offset' ] : -1;
    $args = [
            'post_type'      =>  'portfolio',
            'post_status'    =>  'publish',
            'orderby'        =>  'meta_value',
            'order'          =>  'DESC',
            'meta_key'       =>  '_portfolio_date',
            'posts_per_page' =>  12,
            'paged'          =>  $paged,


    ];
    $portfolio_items = new WP_Query( $args );
    $counter = 0;

    while ( $portfolio_items->have_posts() ) : $portfolio_items->the_post();

        get_template_part( 'loop/portfolio', 'item' );

        $counter++;

    endwhile;

    if ( ($counter % 3) !== 0 && $counter !== 0 ) {
        ?>
            <div class="portfolio-item placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="Placeholder">
            </div>
        <?php
    }

    ?>
    <?php /*<div class="bottom-text">
        <p>Photos : Marie-Ève Paillé Photographe</p>
    </div>*/ ?>
    <?php

    $total_pages = $portfolio_items->max_num_pages;

    if ( $total_pages > 1 ) {

        $current_page = max( 1, get_query_var( 'paged' ) );

        ?>
        <div class="pagination">
        <?php

            echo paginate_links( [
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '/page/%#%',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_text'    => 'Précédent',
                'next_text'    => 'Suivant',
            ] );

        ?>
        </div>
        <?php

    }

    wp_reset_postdata();
    return ob_get_clean();

}
