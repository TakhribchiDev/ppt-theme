<?php


namespace Inc\Template;


final class Product
{
    public static function featuredType() {
        $product = wc_get_product( get_the_id() );
        $output = '';

        if ( $product->is_featured() ) {
            $icon_class = '';

            $terms = wc_get_product_terms( $product->get_id(), 'product_cat');
            foreach ( $terms as $term ) {
                $terms[] = get_term_by( 'id', $term->parent, 'product_cat' );
            }

            array_filter( $terms, function( $term ) use ( &$icon_class ) {
                if ( $term->slug == 'products' ) {
                    $icon_class = ' ppt-coins';
                } elseif ( $term->slug == 'tools' ) {
                    $icon_class = ' ppt-crown';
                }
            } );

            $output .= '<div class="featured-icon">';
            $output .= '<i class="ppt-icon' . $icon_class . '"></i>';
            $output .= '</div><!-- .featured-icon -->';
        }

        return $output;
    }
}