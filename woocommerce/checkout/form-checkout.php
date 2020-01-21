<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="ppt-stepsbar checkout-stepsbar">
    <ul class="steps">
        <li class="step step-user-details active"><?php esc_html_e( 'جزئیات پرداخت', 'ppttheme' ); ?></li>
        <li class="step step-review-order"><?php esc_html_e( 'بررسی نهایی', 'ppttheme' ); ?></li>
        <li class="step step-payment"><?php esc_html_e( 'پرداخت', 'ppttheme' ); ?></li>
    </ul>
</div>

<?php

do_action( 'woocommerce_before_checkout_form', $checkout );

?>

<?php
// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
    return;
}

?>

<form name="checkout" method="post" class="ppt-form" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
    <div class="ppt-steps">
    <?php if ( $checkout->get_checkout_fields() ) : ?>

        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

        <div id="customer_details" class="step-content step-content-user-details active">

            <div class="row">
                <div class="col-md-7">
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                </div><!-- .col-md-7 -->
                <div class="col-md-5">
                    <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                </div><!-- .col-md-5 -->

                <div class="col-md-12 step-buttons">
                    <button class="step-btn step-btn-next" data-current="user-details" data-step="review-order"><?php esc_html_e( 'مرحله بعد', 'ppttheme' ); ?><i class="ppt-icon ppt-chevron-left"></i></button>
                </div>
            </div><!-- .row -->

        </div><!-- .step-content -->

        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

    <?php endif; ?>

    <div id="order_review" class="woocommerce-checkout-review-order">
        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
    </div>

    <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

    </div><!-- .ppt-steps -->

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
