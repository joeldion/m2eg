<?php

require_once( get_template_directory() . '/inc/team/team-meta-boxes.php' );
require_once( get_template_directory() . '/inc/team/team-listing.php' );

/*
 *  Team Custom Post Type
 */
function m2eg_team_cpt() {

    $args = [
            'labels'    =>  [
                    'name'                  => 'Équipe',
                    'singular_name'         => 'Membre',
                    'add_new_item'          => 'Ajouter un membre',
                    'edit_item'             => 'Modifier un membre',
                    'new_item'              => 'Nouveau membre',
                    'all_items'             => 'Tous les membres',
                    'view_item'             => 'Voir le membre',
                    'search_items'          => 'Rechercher parmi les membres',
                    'not_found'             => 'Aucun membre trouvé',
                    'not_found_in_trash'    => 'Aucun membre trouvé dans la corbeille',
                    'menu_item'             => 'Équipe'
            ],
            'description'           => 'Équipe de travail M2EG',
            'exclude_from_search'   => true,
            'supports'              => [ 'title', 'thumbnail' ],
            'show_ui'               => true,
            'menu_icon'             => 'dashicons-admin-users',
            'menu_position'         => 10
    ];

    register_post_type( 'team', $args );

}
add_action( 'init', 'm2eg_team_cpt', 9 );