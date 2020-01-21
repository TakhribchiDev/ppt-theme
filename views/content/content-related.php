<?php
/**
 * PPT Theme loop Standard Post content
 *
 * @package ppttheme
 */

use Inc\Template\Post;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'ppt-related-post' ); ?>>

    <?php
    if ( has_post_thumbnail() ) :
        $featured_image = get_the_post_thumbnail_url();
    endif;
    ?>
    <div class="entry-header ppt-featured-image background-image" style="background-image: url('<?php  echo esc_url( $featured_image ); ?>');">
        <a href="<?php the_permalink(); ?>" class="link"><i class="ppt-icon ppt-eye"></i></a>
    </div><!-- .entry-header -->

    <div class="entry-content">

        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <?php
                echo wp_trim_words( get_the_title(), 5 );
                ?>
            </a>
        </h1>

        <div class="meta-publish">
            <?php
            Post::metaPosted();
            ?>
        </div><!-- .meta-publish -->

    </div><!-- .entry-content -->

    <div class="entry-footer">
        <div class="meta-author">
            <?php
            Post::metaAuthor();
            ?>
        </div><!-- .meta-author -->
        <div class="comments">
            <?php
            Post::footerComments();
            ?>
        </div><!-- .comments -->
    </div><!-- .entry-footer -->
</article>
