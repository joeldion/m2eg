<?php
/*
 * Jobs Listing
 */

function m2eg_get_jobs_listing() {

    ?>

    <div id="jobs">
        <?php

            $args = [
                    'post_type'     =>  'job',
                    'post_status'   =>  'publish',
                    'meta_key'      =>  '_job_deadline',
                    'order'         =>  'DESC',                    
                    'orderby'       =>  'meta_value',                    
                    'meta_query'    =>  [
                                            [
                                                'key'       =>  '_job_deadline',
                                                'value'     =>  current_time( 'mysql' ),
                                                'compare'   =>  '>',
                                                'type'      =>  'DATETIME'
                                            ]
                                        ],
            ];

            $jobs = new WP_Query( $args );

            if ( $jobs->have_posts() ):

                while ( $jobs->have_posts() ): $jobs->the_post();

                    $time = esc_html( get_post_meta( get_the_ID(), '_job_time', true ) );
                    $type = esc_html( get_post_meta( get_the_ID(), '_job_type', true ) );
                    $deadline = strtotime( esc_html( get_post_meta( get_the_ID(), '_job_deadline', true ) ) );
                    $deadline = str_replace( '1 ', '1er ', date_i18n( 'j F Y', $deadline ) );                

                    ?>
                        <div class="job-item">
                            <div class="job-item-wrapper">
                                <div class="job-meta">                                
                                    <h4 class="job-title">
                                        <?php the_title(); ?>
                                    </h4>
                                    <div class="job-type">
                                        <p><?php echo $time . '&nbsp;|&nbsp;' . $type; ?></p>
                                    </div>
                                    <div class="job-description">
                                        <p><?php echo wp_trim_words( get_the_content(), 80 ); ?></p>
                                    </div>
                                    <a class="btn blue job-link" href="<?php echo get_the_permalink(); ?>">
                                        En savoir plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php

                endwhile;

            else:
                ?>
                    <p>Aucune offre d'emploi n'est affichée pour le moment.</p>
                <?php
            endif;

        ?>
    </div>

    <?php

}
