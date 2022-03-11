<?php

/*
** Portfolio Meta Box : Images
*/

add_action( 'add_meta_boxes', 'm2eg_portfolio_images_meta_box' );
add_action( 'save_post', 'm2eg_portfolio_images_meta_box_save' );

function m2eg_portfolio_images_meta_box() {

    add_meta_box(
        'portfolio_images',
        'Images',
        'm2eg_portfolio_images_meta_box_callback',
        'portfolio',
        'normal',
        'high'
    );

}

function m2eg_portfolio_images_meta_box_callback( $args ) {

    wp_nonce_field( 'portfolio_images', 'portfolio_images_nonce' );

    global $post;
    $portfolio_images = esc_html( get_post_meta( $post->ID, '_portfolio_images', true ) );
    $portfolio_credits = esc_html( get_post_meta( $post->ID, '_portfolio_credits', true ) );
    $images_list = [];

    if ( strlen( $portfolio_images ) > 0 ) {
        $images_list = explode( ',', $portfolio_images );
    }

    function m2eg_portfolio_images_output( $index, $images_list ) {
        
        $image_id = intval( $images_list[$index] );
        $image_url = wp_get_attachment_image_url( $image_id, 'medium' );
        $hidden = empty( $image_url ) ? ' hidden' : '';

        $output  = '<div class="portfolio-image-container" id="image-' . $index . '">';
        $output .= '<input type="button" data-index="' . $index . '"';
        $output .= ' class="portfolio-image-upload button button-secondary" value="Choisir une image">';
        $output .= '<input type="hidden" class="portfolio-image" id="portfolio-image-' . $index . '" name="portfolio_image_' . $index . '" value="' . $image_id . '">';
        $output .= '<div id="portfolio-image-preview-' . $index . '" class="portfolio-image-preview' . $hidden . '"'; 
        $output .= ' style="background-image: url( ' . $image_url . ' );"></div>';
        $output .= '<span id="delete-image-' . $index . '" class="delete-image dashicons dashicons-no-alt ';
        $output .= $hidden . '"';
        $output .= ' data-index="' . $index . '"></span>';
        $output .= '</div>';

        echo $output;
        
    }

    if ( !empty( $images_list ) ) {

        for ( $i = 0; $i < count( $images_list ); $i++ ) {
            m2eg_portfolio_images_output( $i, $images_list );
        }

    } else {
        m2eg_portfolio_images_output( 0, $images_list );
    }

    ?>
        <input type="hidden" id="portfolio-images" name="portfolio_images_ids" value="<?php echo !empty( $portfolio_images ) ? $portfolio_images : ''; ?>">
        <input type="button" id="portfolio-add-images" class="<?php echo sizeof( $images_list ) === 0 ? 'hidden' : ''; ?>" value="Ajouter une image">

        <p>
            <label for="portfolio-credits">Crédits pour les photos :
                <input type="text" id="portfolio-credits" name="portfolio_credits" value="<?php echo !empty( $portfolio_credits ) ? $portfolio_credits : ''; ?>">
            </label>
        </p>
        
    <?php

}

function m2eg_portfolio_images_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'portfolio_images_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'portfolio_images_nonce' ];
    if (! wp_verify_nonce( $nonce, 'portfolio_images' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $images_data = sanitize_text_field( $_POST[ 'portfolio_images_ids' ] );
    $credits_data = sanitize_text_field( $_POST[ 'portfolio_credits' ] );

    update_post_meta( $post_id, '_portfolio_images', $images_data );
    update_post_meta( $post_id, '_portfolio_credits', $credits_data );

}
