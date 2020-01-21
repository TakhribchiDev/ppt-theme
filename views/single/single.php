<?php
/**
 * PPT Theme loop Standard Post content
 *
 * @package ppttheme
 */

use Inc\Template\Post;
use Inc\Template\Single;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'ppt-single-post' ); ?>>
    <header class="entry-header row">
        <div class="col-md-5">

            <?php
            echo the_title('<h1 class="entry-title">', '</h1>');
            ?>

            <div class="entry-meta">
                <div class="meta-publish">
                    <?php
                    Post::metaPosted();
                    ?>
                </div><!-- .meta-publish -->
                <div class="meta-author">
                    <?php
                    Post::metaAuthor();
                    ?>
                </div>
            </div><!-- .entry-meta -->

            <p class="entry-excerpt">
                <?php
                echo get_the_excerpt();
                ?>
            </p>

        </div><!-- .col-md-5 -->

        <div class="col-md-7">
            <?php
            if ( has_post_thumbnail() ) :
                $featured_image = get_the_post_thumbnail_url();
            endif;
            ?>
            <div class="ppt-featured-image background-image" style="background-image: url('<?php  echo esc_url( $featured_image ); ?>');">
            </div><!-- .ppt-featured-image -->
        </div><!-- .col-md-7 -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->

    <div class="entry-footer">
        <?php
        Single::tags();

        Single::navigation();

        Single::relatedPosts();
        ?>
    </div><!-- .entry-footer -->

</article>
