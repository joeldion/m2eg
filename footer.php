                </div><!-- #content -->

                <footer>

                    <div class="footer-content">

                        <div class="footer-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img class="site-logo" src="<?php esc_html_e( get_option( 'contact_logo_url_alt' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="150" height="94">
                            </a>
                        </div>

                        <div class="contact-info column-1">
                            <h4>Coordonnées</h4>
                            <span class="data street-address"><?php esc_html_e( get_option('contact_info_street') ); ?></span>
                            <span class="data city pc"><?php esc_html_e( get_option('contact_info_city' ) ); ?> <?php esc_html_e( get_option('contact_info_pc' ) ); ?></span>

                            <?php for ($i = 1; $i <= 2; $i++): ?>
                                <span class="data phone phone-<?php echo $i; ?>">
                                    <a href="tel:<?php echo preg_replace( '/\D+/', '', esc_html( get_option('contact_info_phone_' . $i ) ) ); ?>">
                                        <?php echo str_replace( '-', '&#x2011;', esc_html( get_option('contact_info_phone_' . $i ) ) ); ?>
                                    </a>
                                </span> 
                            <?php endfor; ?>                            
                                                       
                        </div>

                        <?php /*<div class="contact-info column-2">
                            <span class="data phone">
                                <a href="tel:<?php echo str_replace( '-', '', esc_html( get_option('contact_info_phone' ) ) ); ?>">
                                    <?php echo str_replace( '-', '&#x2011;', esc_html( get_option('contact_info_phone' ) ) ); ?>
                                </a>
                            </span>
                            <span class="data email">
                                <a href="mailto:<?php esc_html_e( get_option('contact_info_email' ) ); ?>">
                                    <?php esc_html_e( get_option('contact_info_email' ) ); ?>
                                </a>
                            </span>
                        </div>*/ ?>

                        <div class="contact-social">
                            <ul class="social">
                                <?php if ( !empty( get_option( 'contact_info_facebook' ) ) ): ?>
                                    <li class="icon facebook<?php echo ( strlen( get_option( 'contact_info_facebook' ) ) > 0 ) ? '' : ' hidden'; ?>">
                                        <a href="<?php echo esc_url( get_option( 'contact_info_facebook' ) ); ?>" target="_blank" rel="noopener">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ( !empty( get_option( 'contact_info_instagram' ) ) ): ?>
                                    <li class="icon instagram<?php echo ( strlen( get_option( 'contact_info_instagram' ) ) > 0 ) ? '' : ' hidden'; ?>">
                                        <a href="<?php echo esc_url( get_option( 'contact_info_instagram' ) ); ?>" target="_blank" rel="noopener">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="cert-logo gcr">
                            <p>
                                <img src="<?php echo get_stylesheet_directory_uri() . '/images/logo-GCR.png' ?>" width="200" alt="Garantie Construction Résidentielle">
                            </p>
                        </div>

                        <div class="cert-logo novo">
                            <p>
                                <img src="<?php echo get_stylesheet_directory_uri() . '/images/logo-novoclimat-alt.svg' ?>" width="200" alt="Novoclimat">
                            </p>
                        </div>

                        <div class="cert-logo acq">
                            <p>
                                <img src="<?php echo get_stylesheet_directory_uri() . '/images/logo-acq-alt.svg' ?>" width="200" alt="ACQ">
                            </p>
                        </div>

                    </div>

                    <div class="colophon">

                        <div class="copyright">
                            <p>
                                &#169;&nbsp;<?php echo bloginfo('name'); ?>&nbsp;<?php echo date('Y'); ?>
                            </p>
                        </div>

                    </div>

                </footer>

            </div><!-- #page -->

        <?php wp_footer(); ?>

    </body>
</html>
