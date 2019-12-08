<?php
/**
 * PPT Theme Single Post
 *
 * @package ppttheme
 */

get_header();
?>
    <section id="primary" class="content-area ppt-content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">

                <div class="ppt-single-post">
                            <?php
                            if ( have_posts() ):
                                while ( have_posts() ): the_post();
                                    ?>
                                    <?php
                                    get_template_part( 'views/single/single', get_post_type() );
                                    ?>
                                <?php
                                endwhile;
                            endif;
                            ?>
                </div><!-- .ppt-single-post-->

            </div><!-- .container -->
        </main><!-- .site-main -->
    </section><!-- .content-area -->
<?php
get_footer();