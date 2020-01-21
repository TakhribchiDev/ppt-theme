<?php


namespace Inc\Woocommerce;


class MyAccount
{
    /**
     * Register Wordpress default actions and filters
     */
    public function register() {
        remove_action( 'woocommerce_register_form', 'wc_registration_privacy_policy_text', 20 );

        // Profile Navigation Hooks
        add_action( 'woocommerce_before_account_navigation', [ $this, 'userInfo' ], 30 );
        add_action( 'woocommerce_account_content', [ $this, 'profileTitle' ], 5 );
        add_action( 'woocommerce_register_form', [ $this, 'registerFormPrivacyPolicyText' ] );
    }

    public function userInfo() {
        get_template_part( 'views/auth/user', 'info' );
    }

    public static function profileNavIcon( $endpoint ) {

        $endpoints = array(
            'orders'          => get_option( 'woocommerce_myaccount_orders_endpoint', 'orders' ),
            'downloads'       => get_option( 'woocommerce_myaccount_downloads_endpoint', 'downloads' ),
            'edit-address'    => get_option( 'woocommerce_myaccount_edit_address_endpoint', 'edit-address' ),
            'payment-methods' => get_option( 'woocommerce_myaccount_payment_methods_endpoint', 'payment-methods' ),
            'edit-account'    => get_option( 'woocommerce_myaccount_edit_account_endpoint', 'edit-account' ),
            'customer-logout' => get_option( 'woocommerce_logout_endpoint', 'customer-logout' ),
        );

        switch ( $endpoint ) {
            case $endpoints['orders']:
                echo '<i class="ppt-icon ppt-cart"></i>';
                break;
            case $endpoints['downloads']:
                echo '<i class="ppt-icon ppt-download"></i>';
                break;
            case $endpoints['edit-address']:
                echo '<i class="ppt-icon ppt-checklist"></i>';
                break;
            case $endpoints['edit-account']:
                echo '<i class="ppt-icon ppt-profile-stat"></i>';
                break;
            case $endpoints['customer-logout']:
                echo '<i class="ppt-icon ppt-chevron-right"></i>';
                break;
            default :
                echo '<i class="ppt-icon ppt-dashboard"></i>';
                break;
        }
    }

    public function profileTitle() {
        $requested_link = $_SERVER['REQUEST_URI'];
        $link_parts = explode( '/', $requested_link );

        $endpoint = $link_parts[ sizeof( $link_parts ) - 2 ];

        $endpoints = array(
            'orders'          => get_option( 'woocommerce_myaccount_orders_endpoint', 'orders' ),
            'downloads'       => get_option( 'woocommerce_myaccount_downloads_endpoint', 'downloads' ),
            'edit-address'    => get_option( 'woocommerce_myaccount_edit_address_endpoint', 'edit-address' ),
            'payment-methods' => get_option( 'woocommerce_myaccount_payment_methods_endpoint', 'payment-methods' ),
            'edit-account'    => get_option( 'woocommerce_myaccount_edit_account_endpoint', 'edit-account' ),
        );

        switch ( $endpoint ) {
            case $endpoints['orders']:
                $title =  __( 'سفارش ها', 'ppttheme' );
                break;
            case $endpoints['downloads']:
                $title =  __( 'دانلودها', 'ppttheme' );
                break;
            case $endpoints['edit-address']:
                $title =  __( 'آدرس ها', 'ppttheme' );
                break;
            case $endpoints['edit-account']:
                $title =  __( 'اطلاعات حساب کاربری', 'ppttheme' );
                break;
            default :
                $title =  __( 'داشبورد', 'ppttheme' );
                break;
        }

        $output = '<h1 class="profile-title">' . $title . '</h1>';

        echo $output;
    }

    public function registerFormPrivacyPolicyText() {
        echo '<small class="form-text"><em>';
        wc_privacy_policy_text( 'registration' );
        echo '</em></small>';
    }
}