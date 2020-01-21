<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_reset_password_form' );
?>

    <div class="row">
        <div class="col-md-6 ppt-auth-forms m-auto">
            <div class="form-image-wrapper">
                <img src="<?php echo img( 'key.png' ) ?>" alt="">
            </div>

            <form method="post" class="ppt-form">

                <p><?php echo apply_filters( 'woocommerce_reset_password_message', esc_html__( 'Enter a new password below.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

                <div class="form-group">
                    <label for="password_1" hidden="hidden"><?php esc_html_e( 'گذرواژه جدید', 'ppttheme' ); ?></label>
                    <input type="password" class="form-control" name="password_1" id="password_1" autocomplete="new-password" placeholder="<?php esc_html_e( 'گذرواژه جدید', 'ppttheme' ); ?>" />
                </div>
                <p class="form-group">
                    <label for="password_2" hidden="hidden"><?php esc_html_e( 'تکرار گذرواژه', 'ppttheme' ); ?></label>
                    <input type="password" class="form-control" name="password_2" id="password_2" autocomplete="new-password" placeholder="<?php esc_html_e( 'تکرار گذرواژه', 'ppttheme' ); ?>"/>
                </p>

                <input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
                <input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

                <?php do_action( 'woocommerce_resetpassword_form' ); ?>

                <div class="form-group row">
                    <input type="hidden" name="wc_reset_password" value="true" />
                    <div class="col-md-5 m-auto">
                        <button type="submit" class="ppt-form-submit" value="<?php esc_attr_e( 'تغییر گذرواژه', 'ppttheme' ); ?>"><?php esc_html_e( 'تغییر گذرواژه', 'ppttheme' ); ?></button>
                    </div><!-- col-md-5 -->
                </div>

                <?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>

            </form>
        </div><!-- .col-md-6 -->
    </div><!-- .row -->
<?php
do_action( 'woocommerce_after_reset_password_form' );

