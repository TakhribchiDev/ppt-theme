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

                            <?php
                            if ( have_posts() ):
                                while ( have_posts() ): the_post();
                                    ?>
                                    <?php
                                    get_template_part( 'views/single/single', get_post_type() );
                                    ?>
                                <?php
                                endwhile;

                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                            endif;
                            ?>

            </div><!-- .container -->
        </main><!-- .site-main -->
    </section><!-- .content-area -->
<?php
get_footer();