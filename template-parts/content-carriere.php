<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <?php the_title( '<h1>', '</h1>' ); ?>

    </header>

    <div class="image-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>

    <div class="entry-content">

        <?php
            the_content();
            echo m2eg_get_jobs_listing();
        ?>

    </div>

</article>
