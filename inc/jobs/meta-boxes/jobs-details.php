<?php

/*
** Jobs Meta Box : Details
*/

add_action( 'add_meta_boxes', 'm2eg_job_details_meta_box' );
add_action( 'save_post', 'm2eg_job_details_meta_box_save' );

function m2eg_job_details_meta_box() {

    add_meta_box(
        'job_details',
        'Information',
        'm2eg_job_details_callback',
        'job',
        'normal',
        'high'
    );

}

function m2eg_job_details_callback() {

    wp_nonce_field( 'job_details', 'job_details_nonce' );

    global $post;
    $time = esc_html( get_post_meta( $post->ID, '_job_time', true ) );
    $type = esc_html( get_post_meta( $post->ID, '_job_type', true ) );
    $deadline = esc_attr( get_post_meta( $post->ID, '_job_deadline', true ) );
    $deadline_date = substr( $deadline, 0, 10 );
    $deadline_time = substr( $deadline, -5, 5 );
    $no_deadline = esc_attr( get_post_meta( $post->ID, '_job_no_deadline', true ) );

    $time_labels = [ 'Temps plein', 'Temps partiel' ];
    $type_labels = [ 'Permanent', 'Temporaire', 'Étudiant' ];

    ?>
    <table class="form-table">
        <tbody>

            <tr valign="top">
                <th>
                    <label for="job-time">
                        <span class="option-title">Temps</span>
                    </label>
                </th>
                <td>
                    <select id="job-time" name="job-time">

                        <?php foreach ( $time_labels as $label ): ?>

                                <option value="<?php echo $label; ?>" <?php echo $time === $label ? 'selected' : ''; ?>>
                                    <?php echo $label; ?>
                                </option>

                        <?php endforeach; ?>

                    </select>
                </td>
            </tr>

            <tr valign="top">
                <th>
                    <label for="job-type">
                        <span class="option-title">Type</span>
                    </label>
                </th>
                <td>
                    <select id="job-type" name="job-type">

                        <?php foreach ( $type_labels as $label ): ?>

                                <option value="<?php echo $label; ?>" <?php echo $time === $label ? 'selected' : ''; ?>>
                                    <?php echo $label; ?>
                                </option>

                        <?php endforeach; ?>

                    </select>
                </td>
            </tr>

            <tr valign="top">                
                <th>
                    <label for="job-deadline-date">
                        <span class="option-title">Date de fin de publication</span>
                    </label>
                </th>
                <td>
                    <input type="date" id="job-deadline-date" name="job-deadline-date" value="<?php echo $deadline_date; ?>" />
                    <input type="time" id="job-deadline-time" name="job-deadline-time" value="<?php echo $deadline_time; ?>" />
                </td>
            </tr>

            <tr valign="top">
                <th>
                    <label for="job-deadline-date">
                        <span class="option-title">Aucune date de fin</span>
                    </label>
                </th>
                <td>
                    <input type="checkbox" id="job-no-deadline" name="job-no-deadline" value="1" <?php checked( $no_deadline, '1' ); ?> />                    
                </td>
            </tr>

        </tbody>
    </table>
    <?php

}

function m2eg_job_details_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'job_details_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'job_details_nonce' ];
    if (! wp_verify_nonce( $nonce, 'job_details' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $data_organisation = sanitize_text_field( $_POST[ 'job-organization' ] );
    $data_time = sanitize_text_field( $_POST[ 'job-time' ] );
    $data_type = sanitize_text_field( $_POST[ 'job-type' ] );
    $data_deadline = sanitize_text_field( $_POST[ 'job-deadline-date' ] . ' ' . $_POST[ 'job-deadline-time' ] );
    $data_no_deadline = sanitize_text_field( $_POST[ 'job-no-deadline' ] );
    $data_contact_phone = sanitize_text_field( $_POST[ 'job-contact-phone' ] );
    $data_contact_email = sanitize_email( $_POST[ 'job-contact-email' ] );

    update_post_meta( $post_id, '_job_organization', $data_organisation );
    update_post_meta( $post_id, '_job_time', $data_time );
    update_post_meta( $post_id, '_job_type', $data_type );
    update_post_meta( $post_id, '_job_deadline', $data_deadline );
    update_post_meta( $post_id, '_job_no_deadline', $data_no_deadline );
    update_post_meta( $post_id, '_job_contact_phone', $data_contact_phone );
    update_post_meta( $post_id, '_job_contact_phone', $data_contact_email );

}
