<?php
/**
 * PPT Theme Profile Page
 *
 * @package ppttheme
 */

get_header();
?>
    <section id="primary" class="content-area ppt-content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">

                <?php
                if ( have_posts() ):
                    while ( have_posts() ): the_post();
                        ?>
                        <?php
                        get_template_part( 'views/content/content-page', 'profile' );
                        ?>
                    <?php
                    endwhile;

                endif;
                ?>

            </div><!-- .container -->
        </main><!-- .site-main -->
    </section><!-- .content-area -->
<?php
get_footer();