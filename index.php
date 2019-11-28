<?php
/**
 * PPT Theme general page
 *
 * @package ppttheme
 */

get_header();
?>
<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        if ( have_posts() ) :
            // Load posts loop
            while ( have_posts() ) : the_post();
                get_template_part( 'views/content/content' );
            endwhile;

            the_posts_pagination();
        else:
            // If no posts in the loop, get "No post found"
            get_template_part( 'views/content/content', 'none' );
        endif;
        ?>
    </main><!-- .site-main -->
</section><!-- .content-area -->
<?php
get_footer();