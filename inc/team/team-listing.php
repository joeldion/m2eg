<?php

/*
** Get Team items
*/

function m2eg_team_listing() {

    ob_start();

    $args = [
            'post_type'      =>  'team',
            'post_status'    =>  'publish',
            'orderby'        =>  'meta_value_num',
            'order'          =>  'ASC',
            'meta_key'       =>  '_team_member_listing_order'
    ];
    $team_members = new WP_Query( $args );
    $counter = 0;

    while ( $team_members->have_posts() ) : $team_members->the_post();

        get_template_part( 'loop/team', 'member' );

        $counter++;

    endwhile;

    return ob_get_clean();

}
