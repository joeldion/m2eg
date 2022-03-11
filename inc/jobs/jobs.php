<?php

require_once( __DIR__ . '/jobs-functions.php' );
require_once( __DIR__ . '/meta-boxes/jobs-details.php' );

/*
 *  Job Offer Custom Post Type
 */
function m2eg_job_cpt() {

    $args = [
            'labels'    =>  [
                    'name'                  => 'Offres d\'emploi',
                    'singular_name'         => 'Offre d\'emploi',
                    'add_new_item'          => 'Ajouter une nouvelle offre d\'emploi',
                    'edit_item'             => 'Modifier une offre d\'emploi',
                    'new_item'              => 'Nouvelle offre d\'emploi',
                    'all_items'             => 'Toutes les offres d\'emploi',
                    'view_item'             => 'Voir l\'offre d\'emploi',
                    'search_items'          => 'Recherche parmi les offres d\'emploi',
                    'not_found'             => 'Aucune offre d\'emploi trouvée',
                    'not_found_in_trash'    => 'Aucune offre d\'emploi trouvée dans la corbeille',
                    'menu_item'             => 'Offres d\'emploi'
            ],
            'rewrite'               => [ 'slug' => esc_html__( 'emploi', 'mrcmaskinonge' ) ],
            'description'           => 'Offres d\'emploi à publier',
            'public'                => true,
            'exclude_from_search'   => true,
            'supports'              => [ 'title', 'editor' ],
            'show_ui'               => true,
            'menu_position'         => 11,
            'menu_icon'             => 'dashicons-id-alt'
    ];

    register_post_type( 'job', $args );

}
add_action( 'init', 'm2eg_job_cpt', 9 );
