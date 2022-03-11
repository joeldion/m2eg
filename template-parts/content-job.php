<?php
$time = esc_html( get_post_meta( get_the_ID(), '_job_time', true ) );
$type = esc_html( get_post_meta( get_the_ID(), '_job_type', true ) );
$deadline_time = strtotime( esc_html( get_post_meta( get_the_ID(), '_job_deadline', true ) ) );
$deadline = str_replace( '1 ', '1er ', date_i18n( 'j F Y', $deadline_time ) );
$no_deadline = esc_attr( get_post_meta( get_the_ID(), '_job_no_deadline', true ) );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <?php the_title( '<h1>', '</h1>' ); ?>

    </header>

    <div class="entry-content">

        <?php if ( $deadline_time > time() ): ?>

            <div class="job-item">
                <div class="job-item-wrapper">
                    <div class="job-type">
                        <span><?php echo $time . '&nbsp;|&nbsp;' . $type; ?></span>
                    </div>
                    <?php if ( $no_deadline !== '1' ) { ?>
                        <div class="job-publish-date">
                            <p>Poste affiché jusqu'au <?php echo $deadline; ?></p>
                        </div>
                    <?php } ?>                
                </div>                
            </div>

            <h3>Description du poste : </h3>
            <?php the_content(); ?>
            <a class="btn blue" href="mailto:aadam@m2eg.com">Postuler</a>

        <?php else: ?>

            <p>Nous sommes désolés. Cette offre d'emploi est expirée.</p>

        <?php endif; ?>

    </div>

</article>
