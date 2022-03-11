<?php
/*
 * Home Modules Settings
*/

add_action( 'admin_menu', 'm2eg_home_modules_admin_menu' );
add_action( 'admin_init', 'm2eg_home_modules_settings_init' );

function m2eg_home_modules_admin_menu() {

    add_menu_page(
        'Accueil',
        'Accueil',
        'manage_options',
        'home-modules',
        'm2eg_home_modules_settings',
        'dashicons-schedule',
        3
    );

}

function m2eg_home_modules_settings() {
    ?>
        <h1>Modules de la page d'accueil</h1>
        <hr>
        <form action="options.php" method="post">
            <?php
                settings_fields( 'home-modules' );
                do_settings_sections( 'home-modules' );
                submit_button();
            ?>
        </form>
    <?php
}

function m2eg_home_modules_settings_init() {

    /* ---------------- */
    /* --- Module 1 --- */
    /* ---------------- */

    add_settings_section(
    	'home_module_1_setting_section',
    	'Module 1',
    	'm2eg_home_module_1_settings_callback',
    	'home-modules'
    );

    add_settings_field(
	   'home_module_1_title',
	   'Titre',
	   'home_module_1_title_markup',
	   'home-modules',
	   'home_module_1_setting_section'
	);
    add_settings_field(
	   'home_module_1_btn_text',
	   'Texte du bouton',
	   'home_module_1_btn_text_markup',
	   'home-modules',
	   'home_module_1_setting_section'
	);
    add_settings_field(
	   'home_module_1_btn_link',
	   'Hyperlien du bouton',
	   'home_module_1_btn_link_markup',
	   'home-modules',
	   'home_module_1_setting_section'
	);

    register_setting( 'home-modules', 'home_module_1_title' );
    register_setting( 'home-modules', 'home_module_1_btn_text' );
    register_setting( 'home-modules', 'home_module_1_btn_link' );

    function m2eg_home_module_1_settings_callback() {
        // echo '<p>Intro text for our settings section</p>';
    }

    function home_module_1_title_markup() {
        ?>
            <input type="text" size="60" id="home-module-1-title" name="home_module_1_title" value="<?php echo get_option( 'home_module_1_title' ); ?>">
        <?php
    }

    function home_module_1_btn_text_markup() {
        ?>
            <input type="text" size="60" id="home-module-1-btn-text" name="home_module_1_btn_text" value="<?php echo get_option( 'home_module_1_btn_text' ); ?>">
        <?php
    }

    function home_module_1_btn_link_markup() {
        ?>
            <input type="url" size="60" id="home-module-1-btn-link" name="home_module_1_btn_link" value="<?php echo get_option( 'home_module_1_btn_link' ); ?>">
        <?php
    }

    /* ---------------- */
    /* --- Module 2 --- */
    /* ---------------- */

    add_settings_section(
        'home_module_2_setting_section',
        'Module 2',
        'm2eg_home_module_2_settings_callback',
        'home-modules'
    );

    add_settings_field(
       'home_module_2_title',
       'Titre',
       'home_module_2_title_markup',
       'home-modules',
       'home_module_2_setting_section'
    );
    add_settings_field(
       'home_module_2_btn_text',
       'Texte du bouton',
       'home_module_2_btn_text_markup',
       'home-modules',
       'home_module_2_setting_section'
    );
    add_settings_field(
       'home_module_2_btn_link',
       'Hyperlien du bouton',
       'home_module_2_btn_link_markup',
       'home-modules',
       'home_module_2_setting_section'
    );
    add_settings_field(
       'home_module_2_btn_link',
       'Hyperlien du bouton',
       'home_module_2_btn_link_markup',
       'home-modules',
       'home_module_2_setting_section'
    );
    add_settings_field(
       'home_module_2_bg_image',
       'Image de fond (lien)',
       'home_module_2_bg_image_markup',
       'home-modules',
       'home_module_2_setting_section'
    );

    register_setting( 'home-modules', 'home_module_2_title' );
    register_setting( 'home-modules', 'home_module_2_btn_text' );
    register_setting( 'home-modules', 'home_module_2_btn_link' );
    register_setting( 'home-modules', 'home_module_2_bg_image' );

    function m2eg_home_module_2_settings_callback() {
        //
    }

    function home_module_2_title_markup() {
        ?>
            <input type="text" size="60" id="home-module-2-title" name="home_module_2_title" value="<?php echo get_option( 'home_module_2_title' ); ?>">
        <?php
    }

    function home_module_2_btn_text_markup() {
        ?>
            <input type="text" size="60" id="home-module-2-btn-text" name="home_module_2_btn_text" value="<?php echo get_option( 'home_module_2_btn_text' ); ?>">
        <?php
    }

    function home_module_2_btn_link_markup() {
        ?>
            <input type="url" size="60" id="home-module-2-btn-link" name="home_module_2_btn_link" value="<?php echo get_option( 'home_module_2_btn_link' ); ?>">
        <?php
    }

    function home_module_2_bg_image_markup() {
        ?>
            <input type="url" size="60" id="home-module-2-bg-image" name="home_module_2_bg_image" value="<?php echo get_option( 'home_module_2_bg_image' ); ?>">
        <?php
    }

}
