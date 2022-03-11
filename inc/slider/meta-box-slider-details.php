<?php

/*
 * M2EG Slide Details Meta Box
*/

add_action( 'add_meta_boxes', 'm2eg_slide_details_meta_box' );
add_action( 'save_post', 'm2eg_slide_details_meta_box_save' );

function m2eg_slide_details_meta_box() {

    add_meta_box(
        'slide_details',
        'Informations sur la diapo',
        'm2eg_slide_details_callback',
        'slide',
        'normal',
        'high'
    );

}

function m2eg_slide_details_callback() {

    wp_nonce_field( 'slide_details', 'slide_details_nonce' );

    global $post;
    $subtitle = esc_html( get_post_meta( $post->ID, '_slide_subtitle', true ) );
    $btn_text = esc_html( get_post_meta( $post->ID, '_slide_btn_text', true ) );
    $link = esc_url( get_post_meta( $post->ID, '_slide_link', true ) );

    ?>

    <table class="form-table">
        <tbody>
            <tr valign="top">
                <th>
                    <label for="slide-subtitle">
                        <span class="option-title">Sous-titre</span>
                    </label>
                </th>
                <td>
                    <input type="text" maxlength="200" id="slide-subtitle" name="slide-subtitle" value="<?php echo $subtitle; ?>" style="width:50%;" />
                </td>
            </tr>
            <tr valign="top">
                <th>
                    <label for="slide-btn-text">
                        <span class="option-title">Texte du bouton</span>
                    </label>
                </th>
                <td>
                    <input type="text" maxlength="30" id="slide-btn-text" name="slide-btn-text" value="<?php echo $btn_text; ?>" style="width:50%;" />
                </td>
            </tr>
            <tr valign="top">
                <th>
                    <label for="slide-link">
                        <span class="option-title">Hyperlien du bouton</span>
                    </label>
                </th>
                <td>
                    <input type="url" maxlength="500" id="slide-link" name="slide-link" value="<?php echo $link; ?>" style="width:50%;" />
                </td>
            </tr>
        </body>
    </table>

    <?php

}

function m2eg_slide_details_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'slide_details_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'slide_details_nonce' ];
    if (! wp_verify_nonce( $nonce, 'slide_details' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $data_subtitle = sanitize_text_field( $_POST[ 'slide-subtitle' ] );
    $data_btn_text = sanitize_text_field( $_POST[ 'slide-btn-text' ] );
    $data_link = esc_url_raw( $_POST[ 'slide-link' ] );

    update_post_meta( $post_id, '_slide_subtitle', $data_subtitle );
    update_post_meta( $post_id, '_slide_btn_text', $data_btn_text );
    update_post_meta( $post_id, '_slide_link', $data_link );

}
