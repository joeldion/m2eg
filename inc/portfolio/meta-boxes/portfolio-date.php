<?php

/*
** Portfolio Meta Box : Details
*/

add_action( 'add_meta_boxes', 'm2eg_portfolio_date_meta_box' );
add_action( 'save_post', 'm2eg_portfolio_date_meta_box_save' );

function m2eg_portfolio_date_meta_box() {

    add_meta_box(
        'portfolio_date',
        'Date de réalisation du projet',
        'm2eg_portfolio_date_meta_box_callback',
        'portfolio',
        'normal',
        'high'
    );

    add_meta_box(
        'portfolio_date',
        'Date de réalisation du projet',
        'm2eg_portfolio_date_meta_box_callback',
        'portfolio',
        'normal',
        'high'
    );

}

function m2eg_portfolio_date_meta_box_callback() {

    wp_nonce_field( 'portfolio_date', 'portfolio_date_nonce' );

    global $post;
    $date = esc_textarea( get_post_meta( $post->ID, '_portfolio_date', true ) );

    ?>
    <table class="form-table">
        <tbody>
            <tr valign="top">
                <td>
                    <input type="date" name="portfolio_date" value="<?php echo $date; ?>" required />
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

function m2eg_portfolio_date_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'portfolio_date_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'portfolio_date_nonce' ];
    if (! wp_verify_nonce( $nonce, 'portfolio_date' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $date_data = sanitize_text_field( $_POST[ 'portfolio_date' ] );
    update_post_meta( $post_id, '_portfolio_date', $date_data );

}
