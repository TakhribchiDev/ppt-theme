<?php


namespace Inc\Core;

use Walker_Comment;

class WalkerComment extends Walker_Comment
{
    /**
     * Outputs a single comment.
     *
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment Comment to display.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    protected function comment( $comment, $depth, $args ) {
        if ( 'div' == $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }

        $commenter = wp_get_current_commenter();
        if ( $commenter['comment_author_email'] ) {
            $moderation_note = __( 'Your comment is awaiting moderation.' );
        } else {
            $moderation_note = __( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.' );
        }

        ?>
        <<?php echo $tag; ?> <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?> id="comment-<?php comment_ID(); ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
        <?php endif; ?>
        <div class="comment-author vcard">
            <?php
            if ( 0 != $args['avatar_size'] ) {
                echo get_avatar( $comment, $args['avatar_size'] );}
            ?>
            <?php
            printf(
            /* translators: %s: Comment author link. */
                __( '%s' ),
                sprintf( '<cite class="fn">%s</cite>', get_comment_author_link( $comment ) )
            );
            ?>
        </div>
        <?php if ( '0' == $comment->comment_approved ) : ?>
            <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
            <br />
        <?php endif; ?>

        <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                <?php
                /* translators: 1: Comment date, 2: Comment time. */
                printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
                ?>
            </a>
            <?php
            edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' );
            ?>
        </div>

        <?php
        comment_text(
            $comment,
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                )
            )
        );
        ?>

        <?php
        comment_reply_link(
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<div class="reply">',
                    'after'     => '</div>',
                )
            )
        );
        ?>

        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif; ?>
        <?php
    }

    /**
     * Outputs a comment in the HTML5 format.
     *
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment Comment to display.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    protected function html5_comment( $comment, $depth, $args ) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

        $commenter = wp_get_current_commenter();
        if ( $commenter['comment_author_email'] ) {
            $moderation_note = __( 'Your comment is awaiting moderation.' );
        } else {
            $moderation_note = __( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.' );
        }

        ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php
                    if ( 0 != $args['avatar_size'] ) {
                        echo get_avatar( $comment, $args['avatar_size'] );
                    }
                    ?>
                    <?php
                    printf(
                    /* translators: %s: Comment author link. */
                        __( '%s' ),
                        sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) )
                    );
                    ?>
                </div><!-- .comment-author -->

                <div class="comment-metadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                        <time datetime="<?php comment_time( 'c' ); ?>">
                            <?php
                            /* translators: 1: Comment date, 2: Comment time. */
                            printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
                            ?>
                        </time>
                    </a>
                    <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .comment-metadata -->

                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
                <?php endif; ?>
            </footer><!-- .comment-meta -->

            <div class="comment-content">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <?php
            comment_reply_link(
                array_merge(
                    $args,
                    array(
                        'add_below' => 'div-comment',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => '<div class="reply">',
                        'after'     => '</div>',
                    )
                )
            );
            ?>
        </article><!-- .comment-body -->
        <?php
    }
}