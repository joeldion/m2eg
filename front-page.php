<?php get_header(); ?>

    <div id="primary" class="content-area">

        <main id="main" class="site-main" role="main">

            <?php echo m2eg_get_slider(); ?>

            <div class="home-module-1">

                <div class="module-content">

                    <h4 class="module-title">
                        <?php esc_html_e( get_option( 'home_module_1_title' ) ); ?>
                    </h4>
                    <div class="btn-wrapper">
                        <a class="btn white" href="<?php esc_html_e( get_option( 'home_module_1_btn_link' ) ); ?>">
                            <?php esc_html_e( get_option( 'home_module_1_btn_text' ) ); ?>
                        </a>
                    </div>

                </div>

            </div>

            <?php
                if ( ! empty( get_option( 'home_module_2_bg_image' ) ) ) {
                    $background  = 'style="background-image: linear-gradient(to left, rgba(51, 58, 73, 0.1), #111f3a)';
                    $background .= ', url(' . get_option( 'home_module_2_bg_image' ) . ')"';
                } else {
                    $background = 'style="background-color: #000;"';
                }
            ?>

            <div class="home-module-2" <?php echo $background; ?>>

                <div class="module-content">

                    <h4 class="module-title">
                        <?php esc_html_e( get_option( 'home_module_2_title' ) ); ?>
                    </h4>
                    <div class="btn-wrapper">
                        <a class="btn blue" href="<?php esc_html_e( get_option( 'home_module_2_btn_link' ) ); ?>">
                            <?php esc_html_e( get_option( 'home_module_2_btn_text' ) ); ?>
                        </a>
                    </div>

                </div>

            </div>

        </main>

    </div>

<?php get_footer(); ?>
