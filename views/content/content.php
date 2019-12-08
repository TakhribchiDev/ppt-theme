<?php
/**
 * PPT Theme loop Standard Post content
 *
 * @package ppttheme
 */

use Inc\Template\Post;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'ppt-post' ); ?>>

    <?php
    if ( has_post_thumbnail() ) :
        $featured_image = get_the_post_thumbnail_url();
    endif;
    ?>
    <div class="entry-header ppt-featured-image background-image" style="background-image: url('<?php  echo esc_url( $featured_image ); ?>');">
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
    </div><!-- .entry-header -->

    <div class="entry-content">

        <h1 class="entry-title">
        <?php
        echo wp_trim_words( get_the_title(), 10 );
        ?>
        </h1>

        <p class="entry-excerpt">
            <?php
            echo wp_trim_words( get_the_excerpt(), 22 );
            ?>
        </p>
    </div><!-- .entry-content -->

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
</article>
