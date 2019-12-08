<?php
/**
 * PPT Theme loop Standard Post content
 *
 * @package ppttheme
 */

use Inc\Template\Post;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( [ 'ppt-post', 'row' ] ); ?>>

    <?php
    if ( has_post_thumbnail() ) :
        $featured_image = get_the_post_thumbnail_url();
    endif;
    ?>
    <div class="entry-header col-md-8 ppt-featured-image background-image" style="background-image: url('<?php  echo esc_url( $featured_image ); ?>');">
        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <?php
                echo wp_trim_words( get_the_title(), 10 );
                ?>
            </a>
        </h1>
        <div class="entry-meta">
            <div class="meta-publish">
                <?php
                echo Post::metaPosted();
                ?>
            </div><!-- .meta-publish -->
            <div class="meta-author">
                <?php
                echo Post::metaAuthor();
                ?>
            </div>
        </div><!-- .entry-meta -->
    </div><!-- .entry-header -->

    <div class="entry-content col-md-4">
        <p class="entry-excerpt">
            <?php
            echo wp_trim_words( get_the_excerpt(), 45 );
            ?>
        </p>

        <div class="entry-footer">
            <div class="comments">
                <?php
                echo Post::footerComments();
                ?>
            </div>
            <div class="continue-reading">
                <a href="<?php the_permalink(); ?>" role="button">
                    <?php
                    _e( 'ادامه مطلب' )
                    ?>
                </a>
            </div>
        </div><!-- .entry-footer -->
    </div><!-- .entry-content -->

</article>
