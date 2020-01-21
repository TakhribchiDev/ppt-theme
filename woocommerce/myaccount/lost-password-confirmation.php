<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

wc_print_notice( esc_html__( 'لینک تنظیم مجدد رمز عبور به ایمیل شما ارسال شد.', 'ppttheme' ) );
?>

<div class="row">

    <div class="col-md-6 ppt-auth-forms m-auto">
        <div class="form-image-wrapper">
            <img src="<?php echo img( 'key.png' ) ?>" alt="">
        </div>
        <p class="text-center"><?php echo esc_html( apply_filters( 'woocommerce_lost_password_confirmation_message', esc_html__( 'یک ایمیل برای تنظیم مجدد رمز عبور به آدرس ایمیل شما ارسال شد. لطفا صندوق ورودی ایمیل خود را بررسی کنید.', 'ppttheme' ) ) ); ?></p>
    </div><!-- .col-md-6 -->

</div><!-- .row -->

