<?php


namespace Inc\Template;

use WP_Query;

final class Single
{
   public static function tags() {
       $output = '';

       $output .= '<div class="ppt-tags-container">';
       $output .= '<div class="hr-separator"></div>';
       $output .= '<div class="tags">';
       $output .= '<i class="ppt-icon ppt-tags"></i><span>' . __( 'برچسب ها', 'ppt-theme' ) . '</span>' . get_the_tag_list( '<span class="tags-list">', ' ', '</span>' );
       $output .= '</div><!-- .tags -->';
       $output .= '</div><!-- .ppt-tags-container -->';

       echo $output;
   }

   public static function navigation() {
       echo '<div class="ppt-single-post-pagination">';
        previous_post_link( '%link', '<span class="prev-post"><i class="ppt-icon ppt-chevron-left"></i><span class="link">%title</span></span><!-- .prev-post -->' );
        next_post_link( '%link', '<span class="next-post"><i class="ppt-icon ppt-chevron-right"></i><span class="link">%title</span></span><!-- .next-post -->' );
       echo '</div><!-- .single-post-pagination -->';
   }

    public static function relatedPosts() {
        $post_cat_ids = wp_list_pluck( wp_get_post_terms( get_the_ID(), 'category' ), 'term_id' );
        $post_tag_ids = wp_list_pluck( wp_get_post_terms( get_the_ID(), 'post_tag' ), 'term_id' );

        $related_posts_query = new WP_Query( [
            'post__not_in'      => [ 0, get_the_ID() ],
            'post_type'         => 'post',
            'posts_per_page'    => 3,
            'post_status'       => 'publish',
            'cat__in'           => $post_cat_ids,
            'tag__in'           => $post_tag_ids,
            'orderby'           => 'rand'
        ] );

        if ( $related_posts_query->have_posts() ):
            echo '<div class="ppt-related-posts">';
            echo '<h2>' .  __( 'پست های مرتبط', 'ppttheme' ) . '</h2>';
            echo '<div class="hr-separator"></div>';
            echo '<div class="ppt-related-posts row">';
            while ( $related_posts_query->have_posts() ): $related_posts_query->the_post();
                echo '<div class="col-md-4">';
                    get_template_part( 'views/content/content', 'related' );
                echo '</div><!-- .col-md-4 -->';
            endwhile;
            echo '</div><!-- .row -->';
            echo '</div><!-- .ppt-related-posts -->';
            wp_reset_postdata();
        endif;
    }
}