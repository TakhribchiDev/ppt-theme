<?php
/**
 * PPT Theme Standard Page content
 *
 * @package ppttheme
 */

use Inc\Template\Post;

?>
<article id="page-<?php the_ID(); ?>" <?php post_class( 'ppt-page' ); ?>>

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

</article>
