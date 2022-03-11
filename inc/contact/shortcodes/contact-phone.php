<?php

add_shortcode( 'contact-phone', 'm2eg_contact_phone' );

function m2eg_contact_phone() {

    $phone_1 = esc_html( get_option( 'contact_info_phone_1' ) );
    $phone_2 = esc_html( get_option( 'contact_info_phone_2' ) );
    $phones = [ $phone_1, $phone_2 ];

    ob_start(); 
    ?>

        <ul class="phone">
            <?php 
                foreach( $phones as $phone ) {

                    if ( !empty( $phone ) ) {

                        $phone_href = preg_replace( '/\D+/', '', $phone );
                        $phone_output = str_replace( '‑', '&#x2011;', $phone );

                        ?>
                            <li>
                                <a href="tel:+1<?php echo $phone_href; ?>"><?php echo $phone_output; ?></a>
                            </li>
                        <?php
                    }

                }
            ?>        
        </ul>

    <?php

    return ob_get_clean();

}