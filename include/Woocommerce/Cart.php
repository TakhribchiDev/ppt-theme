<?php


namespace Inc\Woocommerce;


class Cart
{
    /**
     * Register Wordpress default actions and filters
     */
    public function register() {
        remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message' );

        add_action( 'woocommerce_cart_is_empty', [ $this, 'emptyMessage'] );
    }

    function emptyMessage() {
        echo '<div class="cart-empty alert alert-info">' . wp_kses_post( __( 'سبد خرید شما خالی است', 'ppttheme' ) ) . '</div>';
    }
}