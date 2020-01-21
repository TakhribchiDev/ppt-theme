<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.4
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
    return;
}

?>
<div class="woocommerce-form-coupon-toggle">
    <?php wc_print_notice( apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'کوپن تخفیف دارید؟', 'ppttheme' ) . ' <a href="#" class="showcoupon alert-link">' . esc_html__( 'برای وارد کردن کد تخفیف اینجا کلیک کنید', 'ppttheme' ) . '</a>' ), 'notice' ); ?>
</div>

<form class="checkout_coupon ppt-form" method="post" style="display:none">

    <p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'woocommerce' ); ?></p>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="coupon_code" hidden="hidden"><?php esc_attr_e( 'کد تخفیف', 'ppttheme' ); ?></label>
            <input type="text" name="coupon_code" class="form-control" placeholder="<?php esc_attr_e( 'کد تخفیف', 'ppttheme' ); ?>" id="coupon_code" value="" />
        </div>

        <div class="form-group col-md-4 m-auto">
            <button type="submit" class="ppt-form-submit" name="apply_coupon" value="<?php esc_attr_e( 'اعمال تخفیف', 'ppttheme' ); ?>"><?php esc_html_e( 'اعمال تخفیف', 'ppttheme' ); ?></button>
        </div>
    </div><!-- .form-row -->
</form>
