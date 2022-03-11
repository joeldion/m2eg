<?php

require_once( __DIR__ . '/functions/portfolio-listing.php' );
require_once( __DIR__ . '/functions/portfolio-image-sizes.php' );
require_once( __DIR__ . '/functions/portfolio-srcset.php' );
require_once( __DIR__ . '/functions/portfolio-thumbnail.php' );
// require_once( __DIR__ . '/meta-boxes/portfolio-description.php' );
require_once( __DIR__ . '/meta-boxes/portfolio-images.php' );
require_once( __DIR__ . '/meta-boxes/portfolio-date.php' );

/*
** Portfolio Custom Post Type
*/
function m2eg_portfolio_cpt() {

    $args = [
            'labels'    => [
                    'name'                  => 'Réalisations',
                    'singular_name'         => 'Réalisation',
                    'add_new_item'          => 'Ajouter une réalisation',
                    'edit_item'             => 'Modifier une réalisation',
                    'new_item'              => 'Nouvelle réalisation',
                    'all_items'             => 'Toutes les réalisations',
                    'view_item'             => 'Voir la réalisation',
                    'search_items'          => 'Rechercher parmi les réalisations',
                    'not_found'             => 'Aucune réalisation trouvée',
                    'not_found_in_trash'    => 'Aucune réalisation trouvée dans la corbeille',
                    'menu_item'             => 'Réalisations'
            ],
            'description'           => 'Réalisations',
            'public'                => true,
            'has_archive'           => true,
            'rewrite'               => [ 'slug' => 'realisation' ],
            'exclude_from_search'   => true,
            'supports'              => [ 'title', 'thumbnail' ],
            'show_ui'               =>  true,
            'menu_icon'             =>  'dashicons-images-alt2',
            'menu_position'         =>  10,
            'capability_type'       => 'post',
			'publicly_queryable'	=>	true
    ];

    register_post_type( 'portfolio', $args );

}
add_action( 'init', 'm2eg_portfolio_cpt', 9 );
