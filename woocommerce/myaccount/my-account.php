<?php
/**
 * PPT Woocommerce My Account page
 *
 * This template is overridden version of plugins/woocommerce/templates/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

use Inc\Woocommerce\MyAccount;

defined( 'ABSPATH' ) || exit;
?>

<div id="pptProfileContainer" class="ppt-profile-container row">

    <div class="col-md-3 ppt-profile-nav">
    <?php
    /**
     * My Account navigation.
     *
     * @since 2.6.0
     */
    do_action( 'woocommerce_account_navigation' );
    ?>
    </div><!-- .col-md-3 -->

    <div class="ppt-profile-content col-md-9">
    <div class="woocommerce-MyAccount-content">
        <?php
        /**
         * My Account content.
         *
         * @since 2.6.0
         */
        do_action( 'woocommerce_account_content' );
        ?>
    </div>
    </div><!-- .col-md-9 -->

</div><!-- .ppt-profile-container -->