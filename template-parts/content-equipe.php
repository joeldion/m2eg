<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio' ); ?>>

    <header class="entry-header">

        <?php the_title( '<h1>', '</h1>' ); ?>

    </header>

    <div class="entry-content">

        <div class="team">
            <?php echo m2eg_team_listing(); ?>
        </div>

    </div>

</article>
