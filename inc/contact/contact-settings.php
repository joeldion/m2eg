<?php
/*
 * Contact Settings
*/

add_action( 'admin_menu', 'm2eg_contact_admin_menu' );
add_action( 'admin_init', 'm2eg_contact_settings_init' );

function m2eg_contact_admin_menu() {

    add_menu_page(
        'Coordonnées',
        'Coordonnées',
        'manage_options',
        'contact',
        'm2eg_contact_settings',
        'dashicons-phone',
        10
    );

}

function m2eg_contact_settings() {
    ?>
        <h1>Coordonnées de l'entreprise</h1>
        <hr>
        <form action="options.php" method="post">
            <?php
                settings_fields( 'contact' );
                do_settings_sections( 'contact' );
                submit_button();
            ?>
        </form>
    <?php
}

function m2eg_contact_settings_init() {

    /* ------------ */
    /* --- Logo --- */
    /* ------------ */

    add_settings_section(
    	'contact_logo_settings_section',
    	'Logo',
    	'contact_logo_settings_callback',
    	'contact'
    );

    add_settings_field(
	   'contact_logo_url',
	   'URL du logo',
	   'contact_logo_url_markup',
	   'contact',
	   'contact_logo_settings_section'
	);

    add_settings_field(
	   'contact_logo_url_alt',
	   'URL du logo (pour fond sombre)',
	   'contact_logo_url_alt_markup',
	   'contact',
	   'contact_logo_settings_section'
	);

    register_setting(
        'contact',
        'contact_logo_url',
        [
            'type'              =>  'string',
            'sanitize_callback' =>  'sanitize_text_field'
        ]
     );
     register_setting(
         'contact',
         'contact_logo_url_alt',
         [
             'type'              =>  'string',
             'sanitize_callback' =>  'sanitize_text_field'
         ]
      );

    function contact_logo_settings_callback() {

    }

    function contact_logo_url_markup() {
        ?>
            <input type="url" size="80" id="contact-logo-url" name="contact_logo_url" value="<?php echo esc_url( get_option( 'contact_logo_url' ) ); ?>">
        <?php
    }

    function contact_logo_url_alt_markup() {
        ?>
            <input type="url" size="80" id="contact-logo-url-alt" name="contact_logo_url_alt" value="<?php echo esc_url( get_option( 'contact_logo_url_alt' ) ); ?>">
        <?php
    }

    /* ------------------- */
    /* --- Coordonnées --- */
    /* ------------------- */

    add_settings_section(
    	'contact_info_settings_section',
    	'Coordonnées',
    	'contact_info_settings_callback',
    	'contact'
    );
    add_settings_field(
	   'contact_info_street',
	   'Adresse civique',
	   'contact_info_street_markup',
	   'contact',
	   'contact_info_settings_section'
	);
    add_settings_field(
	   'contact_info_city',
	   'Ville',
	   'contact_info_city_markup',
	   'contact',
	   'contact_info_settings_section'
	);
    add_settings_field(
	   'contact_info_pc',
	   'Code postal',
	   'contact_info_pc_markup',
	   'contact',
	   'contact_info_settings_section'
	);
    add_settings_field(
	   'contact_info_phone_1',
	   'Téléphone 1',
	   'contact_info_phone_1_markup',
	   'contact',
	   'contact_info_settings_section'
	);
    add_settings_field(
        'contact_info_phone_2',
        'Téléphone 2',
        'contact_info_phone_2_markup',
        'contact',
        'contact_info_settings_section'
     );
    add_settings_field(
	   'contact_info_email',
	   'Courriel',
	   'contact_info_email_markup',
	   'contact',
	   'contact_info_settings_section'
	);
    add_settings_field(
	   'contact_info_facebook',
	   '<span class="dashicons dashicons-facebook-alt"></span>&nbsp;Facebook',
	   'contact_info_facebook_markup',
	   'contact',
	   'contact_info_settings_section'
	);
    add_settings_field(
	   'contact_info_instagram',
	   '<span class="dashicons dashicons-instagram"></span>&nbsp;Instagram',
	   'contact_info_instagram_markup',
	   'contact',
	   'contact_info_settings_section'
	);

    $settings = [
        'contact_info_street',
        'contact_info_city',
        'contact_info_pc',
        'contact_info_phone_1',
        'contact_info_phone_2',
        'contact_info_email',
        'contact_info_facebook',
        'contact_info_instagram'
    ];

    foreach ( $settings as $setting ) {

        register_setting(
            'contact',
            $setting,
            [
                'type'              =>  'string',
                'sanitize_callback' =>  'sanitize_text_field'
            ]
         );

    }

    function contact_info_settings_callback() {}

    function contact_info_street_markup() {
        ?>
            <input type="text" size="40" id="contact-info-street" name="contact_info_street" value="<?php esc_html_e( get_option( 'contact_info_street' ) ); ?>">
        <?php
    }

    function contact_info_city_markup() {
        ?>
            <input type="text" size="40" id="contact-info-city" name="contact_info_city" value="<?php esc_html_e( get_option( 'contact_info_city' ) ); ?>">
        <?php
    }

    function contact_info_pc_markup() {
        ?>
            <input type="text" size="15" maxlength="7" id="contact-info-pc" name="contact_info_pc" value="<?php esc_html_e( get_option( 'contact_info_pc' ) ); ?>">
        <?php
    }

    function contact_info_phone_1_markup() {
        ?>
            <input type="tel" size="15" id="contact-info-phone-1" name="contact_info_phone_1" value="<?php esc_html_e( get_option( 'contact_info_phone_1' ) ); ?>">
        <?php
    }

    function contact_info_phone_2_markup() {
        ?>
            <input type="tel" size="15" id="contact-info-phone-2" name="contact_info_phone_2" value="<?php esc_html_e( get_option( 'contact_info_phone_2' ) ); ?>">
        <?php
    }

    function contact_info_email_markup() {
        ?>
            <input type="email" size="40" id="contact-info-email" name="contact_info_email" value="<?php esc_html_e( get_option( 'contact_info_email' ) ); ?>">
        <?php
    }

    function contact_info_facebook_markup() {
        ?>
            <input type="text" size="40" maxlength="200" id="contact-info-facebook" name="contact_info_facebook" value="<?php echo esc_url( get_option( 'contact_info_facebook' ) ); ?>">
        <?php
    }

    function contact_info_instagram_markup() {
        ?>
            <input type="text" size="40" maxlength="200" id="contact-info-instagram" name="contact_info_instagram" value="<?php echo esc_url( get_option( 'contact_info_instagram' ) ); ?>">
        <?php
    }


    /* -------------------------- */
    /* --- Heures d'ouverture --- */
    /* -------------------------- */
    $days = [ 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' ];

    add_settings_section(
    	'contact_hours_settings_section',
    	'Heures d\'ouverture',
    	'contact_hours_settings_callback',
    	'contact'
    );

    foreach ( $days as $day ) {

        add_settings_field(
    	   'contact_hours_from_' . $day,
    	   '',
    	   'contact_hours_from_markup',
    	   'contact',
    	   'contact_hours_settings_section',
           [
               'class' => 'contact-hours from',
               'day'   => $day
           ]
    	);

        add_settings_field(
    	   'contact_hours_to_' . $day,
    	   '',
    	   'contact_hours_to_markup',
    	   'contact',
    	   'contact_hours_settings_section',
           [
               'class' => 'contact-hours to',
               'day'   => $day
           ]
    	);

        register_setting( 'contact', 'contact_hours_from_' . $day, [ 'sanitize_callback' => 'sanitize_text_field' ] );
        register_setting( 'contact', 'contact_hours_to_' . $day, [ 'sanitize_callback' => 'sanitize_text_field' ] );

    }

    function contact_hours_settings_callback() {
        ?>
            <p>Si fermé, laissez les champs vides (ex. : «&nbsp;--:--&nbsp;»)</p>
        <?php
    }

    function contact_hours_from_markup( $args ) {
        ?>
            <h4><?php esc_html_e( ucfirst( $args['day'] ) ); ?></h4>
            <p>De :</p>
            <input type="time" id="contact-hours-from-<?php echo $args['day']; ?>" name="contact_hours_from_<?php echo $args['day']; ?>" value="<?php echo get_option( 'contact_hours_from_' . $args['day'] ); ?>" />
        <?php
    }

    function contact_hours_to_markup( $args ) {
        ?>
            <p>À :</p>
            <input type="time" id="contact-hours-to-<?php echo $args['day']; ?>" name="contact_hours_to_<?php echo $args['day']; ?>" value="<?php echo get_option( 'contact_hours_to_' . $args['day'] ); ?>" />
        <?php
    }

}
