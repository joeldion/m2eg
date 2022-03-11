<?php

add_shortcode( 'contact-address', 'm2eg_contact_address' );

function m2eg_contact_address() {

    $street = esc_html( get_option( 'contact_info_street' ) );
    $city = esc_html( get_option( 'contact_info_city' ) );
    $pc = esc_html( get_option( 'contact_info_pc' ) );
    $street = !empty( $street ) ? $street : '';
    $city = !empty( $city ) ? $city : '';
    $pc = !empty( $pc ) ? $pc : '';

    ob_start(); 
    ?>
        <p>
            <span class="data street-address"><?php echo $street; ?><br></span>
            <span class="data city pc"><?php echo $city; ?> <?php echo $pc; ?></span>
        </p>
    <?php

    return ob_get_clean();

}