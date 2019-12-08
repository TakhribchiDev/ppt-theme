<?php
/**
 * PPT Theme general page
 *
 * @package ppttheme
 */

get_header();
?>
    <section id="primary" class="content-area ppt-content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">

                <div class="ppt-blog-posts">
                    <h2><?php _e( 'بلاگ', 'ppttheme' ) ?></h2>
                    <div class="hr-separator"></div>
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-9">
                            <?php
                            $query = new WP_Query([
                               'post_type' => 'post',
                               'status'    => 'published'
                            ]);
                            if ( $query->have_posts() ):
                                while ( $query->have_posts() ): $query->the_post();
                                    ?>
                                        <?php
                                        get_template_part( 'views/content/content-blog', get_post_type() );
                                        ?>
                                <?php
                                endwhile;
                            endif;
                            ?>
                        </div><!-- .col-md-9 -->
                    </div><!-- .row -->
                </div><!-- .ppt-blog-posts-->

            </div><!-- .container -->
        </main><!-- .site-main -->
    </section><!-- .content-area -->
<?php
get_footer();