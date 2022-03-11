<?php

/*
** Portfolio Meta Box : Details
*/

add_action( 'add_meta_boxes', 'm2eg_portfolio_desc_meta_box' );
add_action( 'save_post', 'm2eg_portfolio_desc_meta_box_save' );

function m2eg_portfolio_desc_meta_box() {

    add_meta_box(
        'portfolio_desc',
        'Courte description du projet',
        'm2eg_portfolio_desc_meta_box_callback',
        'portfolio',
        'normal',
        'high'
    );

}

function m2eg_portfolio_desc_meta_box_callback() {

    wp_nonce_field( 'portfolio_desc', 'portfolio_desc_nonce' );

    global $post;
    $desc = esc_textarea( get_post_meta( $post->ID, '_portfolio_desc', true ) );

    ?>
    <table class="form-table">
        <tbody>
            <tr valign="top">
                <td>
                    <textarea name="portfolio_desc" rows="5" maxlength="200" style="width: 100%;"><?php echo $desc; ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

function m2eg_portfolio_desc_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'portfolio_desc_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'portfolio_desc_nonce' ];
    if (! wp_verify_nonce( $nonce, 'portfolio_desc' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $desc_data = sanitize_textarea_field( $_POST[ 'portfolio_desc' ] );
    update_post_meta( $post_id, '_portfolio_desc', $desc_data );

}
