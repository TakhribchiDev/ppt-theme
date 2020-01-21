<?php
/**
 * PPT Theme Comments Template
 *
 * @package ppttheme
 */

use Inc\Core\WalkerComment;
use Inc\Template\Comment;

if ( post_password_required() )
    return;
?>
<div id="comments" class="comments-area ppt-comments-area">
    <div class="hr-separator"></div>
    <?php if ( have_comments() ) :  ?>

        <h2 class="comments-title">
            <?php
            printf( _nx( 'یک نظر برای "%2$s"', '%1$s نظر برای "%2$s"', get_comments_number(), 'comments title', 'ppttheme' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>');
            ?>
        </h2>

        <?php
        Comment::navigation();
        ?>

        <ol class="comment-list">
            <?php
            wp_list_comments( [
                'walker' => new WalkerComment(),
                'style' => 'ol',
                'type'  => 'all',
                'reply_text' => __( 'پاسخ' ),
                'avatar_size'  => 96,
                'echo'  => true
            ] );
            ?>
        </ol><!-- .comment-list -->

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php _e( 'نظرات قفل شده است.' , 'ppt-theme' ); ?></p>
        <?php endif; ?>

        <?php
        Comment::navigation();
        ?>

    <?php endif;  ?>
    
    <div class="row">
        <div class="comment-form col-md-7">
            <?php
            Comment::form();
            ?>
        </div><!-- .comment-form -->
    </div><!-- .row -->
</div><!-- #comments -->

