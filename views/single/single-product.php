<?php
/**
 * PPT Theme loop Product content
 *
 * @package ppttheme
 */

use Inc\Template\Product;

?>
<article id="product-<?php the_ID(); ?>" <?php post_class( 'ppt-product' ); ?>>



    <?php
    if ( has_post_thumbnail() ) :
        $featured_image = get_the_post_thumbnail_url();
    endif;
    ?>
    <div class="ppt-featured-image background-image" style="background-image: url('<?php echo ( $featured_image ? $featured_image : '' ); ?>')">
        <h1 class="title"><?php echo wp_trim_words( get_the_title(), 5 ) ?></h1>
    </div>

    <div id="productPreviewSlider<?php the_ID();?>" class="ppt-product-preview-slider carousel slide carousel-fade" data-ride="carousel" data-pause="false">
        <?php
        $attachments = get_attached_media( 'image', get_the_ID() );
        ?>

        <div class="carousel-inner">

            <div class="carousel-item active" data-interval="500">
                <div class="d-block w-100 carousel-slide background-image" style="background-image: url('<?php echo esc_url($featured_image); ?>')"></div>
            </div><!-- .carousel-item -->

            <?php foreach ( $attachments as $attachment ) :
                $attachment_thumb_info = wp_get_attachment_image_src( $attachment->ID, 'medium' );
                ?>
                <div class="carousel-item" data-interval="2000">
                    <div class="d-block w-100 carousel-slide background-image" style="background-image: url('<?php echo esc_url($attachment_thumb_info[0]); ?>')"></div>
                </div><!-- .carousel-item -->
            <?php endforeach; ?>

        </div><!-- .carousel-inner -->

        <div class="tiny-timer">
            <svg>
                <circle r="12" cx="17.5" cy="17.5"></circle>
            </svg>
        </div>

        <?php
        echo Product::featuredType();
        ?>

    </div><!-- .ppt-product-preview-slider -->

    <div class="product-meta">
        <div class="meta-item posted">
            <i class="ppt-icon ppt-time"></i>
            <div class="text"><?php esc_html_e( human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ), 'ppttheme' ); ?></div>
        </div>
        <div class="meta-item downloads">
            <i class="ppt-icon ppt-download"></i>
            <div class="text"><?php esc_html_e( '100', 'ppttheme' ); ?></div>
        </div>
        <div class="meta-item views">
            <i class="ppt-icon ppt-eye"></i>
            <div class="text"><?php esc_html_e( '100', 'ppttheme' ); ?></div>
        </div>
    </div>

</article>
