<?php

add_shortcode( 'contact-hours', 'm2eg_contact_hours' );

function m2eg_contact_hours() {

    ob_start();

    $days = [ 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' ];

    ?>
        <table class="hours">
            <tbody>
                <?php
                    foreach( $days as $day ) :

                        $from =  m2eg_hours_format( get_option( 'contact_hours_from_' . $day ) );
                        $to =  m2eg_hours_format( get_option( 'contact_hours_to_' . $day ) );

                ?>

                        <tr>
                            <td>
                                <?php esc_html_e( ucfirst( $day ) ); ?>
                            </td>
                            <td>
                                <?php
                                    if ( !empty( get_option( 'contact_hours_from_' . $day ) ) && !empty( get_option( 'contact_hours_to_' . $day ) ) ) {
                                        echo $from . '&nbsp;à&nbsp;' . $to;
                                    } else {
                                        echo 'Fermé';
                                    }
                                ?>
                            </td>
                        </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    <?php

    return ob_get_clean();

}

function m2eg_hours_format( $hours ) {

    $find = [ '/^0/', '/:/', '/00$/' ];
    $replace = [ '', 'h', '' ];
    $result = preg_replace( $find, $replace, $hours );

    return $result;

}
