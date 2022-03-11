<?php

/*
** Team Member Meta Box : Info
*/

add_action( 'add_meta_boxes', 'm2eg_team_info_meta_box' );
add_action( 'save_post', 'm2eg_team_info_meta_box_save' );

function m2eg_team_info_meta_box() {

    add_meta_box(
        'team_member_info',
        'Information',
        'm2eg_team_info_callback',
        'team',
        'normal',
        'high'
    );

}

function m2eg_team_info_callback() {

    wp_nonce_field( 'team_member_info', 'team_member_info_nonce' );

    global $post;
    $job_title = esc_html( get_post_meta( $post->ID, '_team_member_job_title', true ) );
    $member_order = intval( get_post_meta( $post->ID, '_team_member_listing_order', true ) );

    $args = [
        'post_type'     =>  'team',
        'post_status'   =>  'publish',
        'orderby'       =>  'meta_value_num',
        'order'         =>  'ASC',
        'meta_key'      =>  '_team_member_listing_order'
    ];
    $order_list = new WP_Query($args);
    $order = [];

    while ( $order_list->have_posts() ): $order_list->the_post();
        $cur_order = intval( get_post_meta( get_the_ID(), '_team_member_listing_order', true ) );
        $member_data = [
            'member_name'  =>  get_the_title(),
            'member_order' =>  $cur_order
        ];
        array_push( $order, $member_data );
    endwhile;

    ?>
    <table class="form-table">
        <tbody>
            <tr valign="top">
                <th>
                    <label for="member-job-title">
                        <span class="option-title">Titre du poste</span>
                    </label>
                </th>
                <td>
                    <input type="text" size="100" maxlength="200" id="member-job-title" name="member-job-title" value="<?php echo $job_title; ?>" />
                </td>
            </tr>
            <tr>
            <th>
                    <label for="member-order">
                        <span class="option-title">Ordre d'apparition</span>
                    </label>
                </th>
                <td>
                    <select name="member-order" id="member-order">
                        <?php for ( $i = 0; $i < count($order); $i++ ): ?>
                            <option value="<?php echo $order[$i]['member_order']; ?>" <?php selected( $order[$i]['member_order'], $member_order, 'selected' ); ?>>
                                <?php echo $order[$i]['member_order'] . ' - ' . $order[$i]['member_name']; ?>
                            </option>
                        <?php endfor; ?>                        
                    </select>                    
                </td>
            </tr>
        </tbody>
    </table>
    <?php

}

function m2eg_team_info_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'team_member_info_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'team_member_info_nonce' ];
    if (! wp_verify_nonce( $nonce, 'team_member_info' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $data_job_title = sanitize_text_field( $_POST[ 'member-job-title' ] );
    $data_order = sanitize_text_field( $_POST[ 'member-order' ] );
    update_post_meta( $post_id, '_team_member_job_title', $data_job_title );
    update_post_meta( $post_id, '_team_member_listing_order',  $data_order );

}
