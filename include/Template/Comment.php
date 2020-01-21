<?php


namespace Inc\Template;


final class Comment
{
    public static function navigation() {
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                echo '<div class="ppt-comments-pagination">';
                echo '<span class="prev-comments"><i class="ppt-icon ppt-chevron-left"></i><span class="link">';
                previous_comments_link( esc_html__( 'نظرات قدیمی تر' ) );
                echo '</span></span><!-- .prev-comments -->';
                echo '<span class="next-comments"><i class="ppt-icon ppt-chevron-right"></i><span class="link">';
                next_comments_link( esc_html__( 'نظرات جدید تر' ) );
                echo '</span></span><!-- .next-comments -->';
                echo '</div><!-- .ppt-comments-pagination -->';
            endif;
    }

    public static function form() {
        $commenter = wp_get_current_commenter();
        $consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
        $fields = array(
            'author' => '<div class="form-group"><label for="author" hidden="hidden">' . __( 'نام', 'ppttheme' ) .
                '</label><input id="author" name="author" type="text" class="form-control ppt-form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" placeholder="' . __( 'نام' ) . '"/></div>',
            'email' => '<div class="form-group"><label for="email" hidden="hidden">' . __( 'ایمیل', 'sunset-theme' ) .
                '</label> <input id="email" name="email" type="text" class="form-control ppt-form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" placeholder="' . __( 'ایمیل' ) . '"/></div>',
            'url' => '<div class="form-group"><label for="url" hidden="hidden">' . __( 'وبسایت', 'ppttheme' ) . '</label> <input id="url" name="url" type="text" class="form-control ppt-form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . __( 'وبسایت' ) . '"/></div>',
            'cookies' => '<div class="form-group custom-control custom-checkbox ppt-checkbox"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" class="custom-control-input" value="yes" ' . $consent . '/> <label class="custom-control-label" for="wp-comment-cookies-consent">' . __( 'اطلاعات من را برای نظرات بعدی ذخیره کن' ) . '</label></div>'
        );
        $args = array(
            'comment_notes_before' => '<p class="comment-note">'. __( 'نشانی ایمیل شما منتشر نخواهد شد. بخش های مورد نیاز با * علامت گذاری شده اند', 'ppttheme' ) . '</p>',
            'class_submit' => 'ppt-comment-submit',
            'label_submit' => __('ارسال', 'ppttheme'),
            'submit_button' => '<a name="%1$s" type="submit" id="%2$s" class="%3$s" onclick="document.getElementById(\'commentform\').submit()">%4$s</a>',
            'title_reply' => __( 'نظرتان را ثبت کنید', 'ppttheme' ),
            'comment_field' => '<div class="form-group"><label for="comment" hidden="hidden">' . _x( 'نظر', 'noun' ) . '</label><textarea id="comment" class="form-control ppt-form-control" name="comment" rows="4" aria-required="true" required="required" placeholder="' . __( 'نظر شما ...' ) . '"></textarea></div>',
            'fields'       => apply_filters( 'comment_form_default_fields', $fields )
        );
        comment_form( $args );
    }
}