<?php


namespace Inc\Woocommerce;

use WC_Template_Loader;
use WP_Query;
use function Sodium\add;

class SingleProduct
{
    /**
     * Register wordpress default actions and hooks
     */
    public function register() {
        /*
         * Remove default woocommerce actions and filters
         */
        remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
        remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt' );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

        /*
         * Add custom ppt theme actions and filters
         */
        // Content Wrapper
        add_action( 'woocommerce_before_main_content', [ $this, 'beforeMainContent'], 10 );
        add_action( 'woocommerce_after_main_content', [ $this, 'afterMainContent'], 10 );
        // Single Product Wrapper
        add_action( 'woocommerce_before_single_product', [ $this, 'beforeSingleProduct' ], 20 );
        add_action( 'woocommerce_after_single_product', [ $this, 'afterSingleProduct' ], 20 );
        // Summary and Gallery Wrapper
        add_action( 'woocommerce_before_single_product_summary', [ $this, 'beforeGallerySummary' ], 15 ); // Priority 15 to wrap product gallery
        add_action( 'woocommerce_after_single_product_summary', [ $this, 'afterGallerySummary' ], 5 ); // Priority 5 to not wrap data tabs
        // Product Image Gallery Wrapper
        add_action( 'woocommerce_before_single_product_summary', [ $this, 'beforeGallery' ], 19 ); // Priority 18 to wrap product gallery
        add_action( 'woocommerce_before_single_product_summary', [ $this, 'afterGallery' ], 21 ); // Priority 22 to wrap product gallery
        // Product Image Wrapper
        // Product Thumbnails Size
        add_filter( 'woocommerce_gallery_thumbnail_size', [ $this, 'galleryThumbnailResize' ] );
        // Product Summary Wrapper
        add_action( 'woocommerce_before_single_product_summary', [ $this, 'beforeSummary' ], 22 ); // Priority 22 to just wrap product summary
        add_action( 'woocommerce_after_single_product_summary', [ $this, 'afterSummary' ], 4 ); // Priority 4 to just wrap product summary
        // Product Summary
        add_action( 'woocommerce_share', [ $this, 'shareLinks' ] );
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 45 );
        add_filter( 'woocommerce_quantity_input_min', function () { return 1; });
        add_filter( 'woocommerce_quantity_input_max', function () { return 1; });
        add_filter( 'woocommerce_product_price_class', function ( $class ) { return $class . ' ppt-price'; } );
        add_filter( 'wc_price_args', [ $this, 'priceArgsModify' ] );
        add_action( 'woocommerce_after_single_product_summary', [ $this, 'relatedProducts' ], 20 );
        add_filter( 'woocommerce_product_tabs', [ $this, 'modifyProductTabs' ] );
        add_filter( 'comments_template', function () { return '/comments.php'; }, 20 );
        add_action( 'woocommerce_after_single_product_summary', [ $this, 'productReviews' ], 30 );
        // Add to cart notice
        add_filter( 'wc_add_to_cart_message_html', [ $this, 'addToCartMessage' ], 90 );
    }

    public function beforeMainContent() {
        echo '<section id="primary" class="content-area ppt-content-area"><main id="main" class="site-main" role="main"><div class="container">';
    }

    public function afterMainContent() {
        echo '</div><!-- .container --></main><!-- .site-main --></section><!-- .content-area -->';
    }

    public function beforeSingleProduct() {
        echo '<div class="ppt-single-product">';
    }

    public function afterSingleProduct() {
        echo '</div><!-- .ppt-single-product -->';
    }

    public function beforeGallerySummary() {
        echo '<div class="row">';
    }

    public function afterGallerySummary() {
        echo '</div><!-- .row -->';
    }

    public function beforeGallery() {
        echo '<div class="col-md-7">';
    }

    public function afterGallery() {
        echo '</div><!-- .col-md-7 -->';
    }

    public function galleryThumbnailResize( $size ) {
        $size = 'medium';

        return $size;
    }

    public function beforeSummary() {
        echo '<div class="col-md-5">';
    }

    public function afterSummary() {
        echo '</div><!-- .col-md-5 -->';
    }

    public function priceArgsModify( $args ) {
        $args[ 'decimals' ] = 0;

        return $args;
    }

    public function shareLinks() {
        $output = '<h4 class="share-title">' . __( 'به اشتراک بگذارید', 'ppttheme' ) . '</h4>';
        $output .= '<div class="share-links">';
        $output .= '<a class="social-link link-telegram" href="#" role="button"><i class="ppt-icon ppt-telegram"></i></a>';
        $output .= '<a class="social-link link-instagram" href="#" role="button"><i class="ppt-icon ppt-instagram"></i></a>';
        $output .= '<a class="social-link link-facebook" href="#" role="button"><i class="ppt-icon ppt-facebook"></i></a>';
        $output .= '<a class="social-link link-twitter" href="#" role="button"><i class="ppt-icon ppt-twitter"></i></a>';
        $output .= '<a class="social-link link-mail" href="#" role="button"><i class="ppt-icon ppt-mail"></i></a>';
        $output .= '</div><!-- .share-links -->';

        echo $output;
    }

    public function relatedProducts() {
        global $product;

        $product_cat_ids = wp_list_pluck( wp_get_post_terms( $product->get_id() , 'product_cat' ), 'term_id' );
        $product_tag_ids = wp_list_pluck( wp_get_post_terms( $product->get_id() , 'product_tag' ), 'term_id' );


        $related_products_query = new WP_Query( [
            'post__not_in'      => [ 0, $product->get_id()  ],
            'post_type'         => 'product',
            'posts_per_page'    => 4,
            'post_status'       => 'publish',
            'orderby'           => 'rand',
            'tax_query'         => [
                'relation'      => 'OR',
                [
                    'taxonomy'  => 'product_cat',
                    'field'     => 'term_id',
                    'terms'     => $product_cat_ids
                ],
                [
                    'taxonomy'  => 'product_tag',
                    'field'     => 'term_id',
                    'terms'     => $product_tag_ids
                ]
            ]
        ] );

        if ( $related_products_query->have_posts() ):
            echo '<div class="ppt-related-products">';
            echo '<h2>' .  __( 'محصولات مرتبط', 'ppttheme' ) . '</h2>';
            echo '<div class="hr-separator"></div>';
            echo '<div class="ppt-related-products row">';
            while ( $related_products_query->have_posts() ): $related_products_query->the_post();
                echo '<div class="col-md-3">';
                get_template_part( 'views/content/content', 'product' );
                echo '</div><!-- .col-md-4 -->';
            endwhile;
            echo '</div><!-- .row -->';
            echo '</div><!-- .ppt-related-products -->';
            wp_reset_postdata();
        endif;
    }

    public function modifyProductTabs( $tabs ) {
        unset( $tabs[ 'reviews' ] );

        return $tabs;
    }

    public function productReviews() {
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    }

    public function addToCartMessage( $message ) {
        $message = preg_replace( '/(<a\s[^>]*?class=[\'"]).+?([\'"].*)/', '\1alert-btn\2', $message );

        return $message;
    }
}