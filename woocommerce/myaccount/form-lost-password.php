<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

    <div class="row">

        <div class="col-md-6 m-auto ppt-auth-forms">

            <div class="form-image-wrapper">
                <img src="<?php echo img( 'key.png' ) ?>" alt="">
            </div>

            <form method="post" class="ppt-form">

                <p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'نام کاربری یا ایمیل خود را وارد کنید تا لینک ساخت رمز جدید را برایتان بفرستیم', 'ppttheme' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

                <div class="form-group">
                    <label for="user_login" hidden="hidden"><?php esc_html_e( 'نام کاربری یا ایمیل', 'ppttheme' ); ?></label>
                    <input class="form-control" type="text" name="user_login" id="user_login" autocomplete="username" placeholder="<?php esc_html_e( 'نام کاربری یا ایمیل', 'ppttheme' ); ?>" />
                </div>

                <?php do_action( 'woocommerce_lostpassword_form' ); ?>

                <div class="form-group row">
                    <input type="hidden" name="wc_reset_password" value="true" />
                    <button type="submit" class="ppt-form-submit col-md-5 m-auto" value="<?php esc_attr_e( 'بازگردانی گذرواژه', 'ppttheme' ); ?>"><?php esc_html_e( 'بازگردانی گذرواژه', 'ppttheme' ); ?></button>
                </div>

                <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

            </form>

        </div><!-- .col-md-6 -->

    </div><!-- .row -->
<?php
do_action( 'woocommerce_after_lost_password_form' );
