<?php
/*
 * M2EG Slider
*/
require_once( __DIR__ . '/meta-box-slider-details.php' );
require_once( __DIR__ . '/functions-slider.php' );

function m2eg_slide_cpt() {

    $args = [
            'labels'    =>  [
                    'name'                  => 'Diapos',
                    'singular_name'         => 'Diapo',
                    'add_new_item'          => 'Ajouter une nouvelle diapo',
                    'edit_item'             => 'Modifier une diapo',
                    'new_item'              => 'Nouvelle diapo',
                    'all_items'             => 'Toute les diapos',
                    'view_item'             => 'Voir la diapo',
                    'search_items'          => 'Rechercher les diapos',
                    'not_found'             => 'Aucune diapo trouvée',
                    'not_found_in_trash'    => 'Aucune diapo trouvée dans la corbeille',
                    'menu_item'             => 'Diaporama',
            ],
            'rewrite'               => [ 'slug' => 'diapo' ],
            'description'           => 'Diapos sur la page d\'accueil',
            'public'                => false,
            'exclude_from_search'   => true,
            'supports'              => [ 'title', 'thumbnail' ],
            'show_ui'               => true,
            'menu_position'         => 11,
            'menu_icon'             => 'dashicons-format-gallery'
    ];

    register_post_type( 'slide', $args );

}
add_action( 'init', 'm2eg_slide_cpt', 9 );
