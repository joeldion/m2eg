<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio' ); ?>>

    <header class="entry-header">

        <?php the_title( '<h1>', '</h1>' ); ?>

    </header>

    <div class="entry-content">

        <?php 
            // IE
            if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || preg_match('~Trident/7.0(; Touch)?; rv:11.0~',$_SERVER['HTTP_USER_AGENT'])) {

                ?>
                    <div class="ie-message">
                        <h3>Votre navigateur est désuet</h3>
                        <p>Pour voir cette page, vous devez utiliser un navigateur moderne tel que <a href="https://www.google.com/intl/fr_CA/chrome/" rel="noopener" target="_blank">Google Chrome</a>, <a href="https://www.mozilla.org/fr/firefox/new/" rel="noopener" target="_blank">Mozilla Firefox</a> ou <a href="https://www.microsoft.com/fr-fr/edge" rel="noopener" target="_blank">Microsoft Edge</a>.</p>
                    </div>
                    
                <?php
                
            } else {
                ?>
                    <div id="portfolio-listing">
                        <?php echo m2eg_portfolio_listing(); ?>
                    </div>
                <?php 
            }

        ?>


    </div>

</article>
