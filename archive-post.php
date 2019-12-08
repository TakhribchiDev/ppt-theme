<?php
/**
 * PPT Theme posts archive
 *
 * @package ppttheme
 */

get_header();
?>
    <section id="primary" class="content-area ppt-content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">

                <div class="ppt-last-posts">
                    <h2><?php _e( 'آخرین پست های بلاگ', 'ppttheme' ) ?></h2>
                    <div class="hr-separator"></div>
                    <div id="lastPostsScrollider" class="ppt-scrollider">
                        <div class="scrollide scrollide-right"><i class="ppt-icon ppt-chevron-right-thin"></i></div>
                        <div class="scrollide scrollide-left"><i class="ppt-icon ppt-chevron-left-thin"></i></div>
                        <div class="scrollide-box">
                            <?php
                            if ( have_posts() ):
                                while ( have_posts() ): the_post();
                                    ?>
                                    <div class="scrollide-item">
                                        <?php
                                        get_template_part( 'views/content/content', get_post_type() );
                                        ?>
                                    </div><!-- .scrollide-item -->
                                <?php
                                endwhile;
                            endif;
                            ?>
                        </div><!-- .scrollide-box -->
                    </div><!-- .ppt-scrollider -->
                </div><!-- .ppt-last-posts-->

            </div><!-- .container -->
        </main><!-- .site-main -->
    </section><!-- .content-area -->
<?php
get_footer();