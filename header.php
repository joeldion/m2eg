<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-B40LSE32T8"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-B40LSE32T8');
        </script>
    </head>
    <?php 
        $body_classes = [];
        if ( is_IE() ) {
            array_push( $body_classes, 'noscroll' );
        }
    ?>
    <body <?php body_class( $body_classes ); ?>>

        <?php if ( current_user_can('administrator' ) ): ?>

            <?php // IE
            if ( is_IE() ): ?>
                
                <div class="ie-modal">
                    <h3>Votre navigateur est désuet</h3>
                    <p>Pour voir cette page, vous devez utiliser un navigateur moderne tel que <a href="https://www.google.com/intl/fr_CA/chrome/" rel="noopener" target="_blank">Google Chrome</a>, <a href="https://www.mozilla.org/fr/firefox/new/" rel="noopener" target="_blank">Mozilla Firefox</a> ou <a href="https://www.microsoft.com/fr-fr/edge" rel="noopener" target="_blank">Microsoft Edge</a>.</p>
                </div>
                <div class="ie-modal__overlay"></div>
                
            <?php endif; ?>
        
        <?php endif; ?>

        <div id="page">

            <header id="masthead" class="site-header" role="banner">

                <div class="site-branding">
                    <div class="site-logo-wrapper">
                        <h1>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img class="site-logo" src="<?php esc_html_e( get_option( 'contact_logo_url' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="150" height="94">
                            </a>
                        </h1>
                    </div>
                </div>

                <div id="hamburger">
                    <i class="fa fa-bars"></i>
                </div>

                <nav id="site-navigation" class="main-navigation" role="navigation">

                    <?php
                        $args = [
                            'theme_location' => 'main-menu',
                        ];
                        wp_nav_menu( $args );

                        $args_mobile = [
                            'theme_location' => 'main-menu-mobile',
                        ];
                        wp_nav_menu( $args_mobile );
                    ?>

                </nav>

                <div id="top-right">

                    <ul class="social">
                        <li class="icon facebook<?php echo ( strlen( get_option( 'contact_info_facebook' ) ) > 0 ) ? '' : ' hidden'; ?>">
                            <a href="<?php echo esc_url( get_option( 'contact_info_facebook' ) ); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="icon instagram<?php echo ( strlen( get_option( 'contact_info_instagram' ) ) > 0 ) ? '' : ' hidden'; ?>">
                            <a href="<?php echo esc_url( get_option( 'contact_info_instagram' ) ); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>

                    <?php if ( current_user_can( 'administrator' ) ): ?>

                        <div class="client">
                            <a href="#">Espace client</a>
                        </div>

                    <?php endif; ?>

                </div>

            </header>

            <div id="content" class="site-content">
