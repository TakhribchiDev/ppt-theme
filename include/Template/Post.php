<?php


namespace Inc\Template;


final class Post
{
    public static function metaPosted() {
        $posted_on = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );

        $categories = get_the_category();
        $separator = '/';
        $posted_in = '';
        $i = 1;

        if ( ! empty( $categories ) ) :
            foreach ( $categories as $category ) :
                if ( $i > 1 ) : $posted_in .= $separator; endif;
                $posted_in .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( 'View all posts in %s', $category->name ) . '">' . $category->name . '</a>';
                $i++;
            endforeach;
        endif;

        return '<i class="ppt-icon ppt-edit"></i><span class="posted-on"><a href="' . get_the_permalink() . '">' . $posted_on . '</a></span><span>' . esc_html( 'پیش در' ) . '</span></span><span class="posted-in">' . $posted_in . '</span>';

    }

    public static function metaAuthor() {
        return '<i class="ppt-icon ppt-ink-pen"></i><span class="author"><a href="' . get_the_author_link() . '">' . get_the_author() . '</a></span>';
    }

    public static function footerComments() {
        $comments_num = get_comments_number();

        if ( comments_open() ) {
            if ( $comments_num == 0 ) {
                $comments = __( 'نظری ثبت نشده' );
            } elseif ( $comments_num > 0 ) {
                $comments = __( $comments_num . 'نظر' );
            }
        } else {
            $comments = __( 'نظرات قفل شده' );
        }

        return '<i class="ppt-icon ppt-comment"></i><a class="comments-link" href="' . get_comments_link() . '">' . $comments . '</a>';
    }
}