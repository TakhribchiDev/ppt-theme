<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
    return;
}

?>
<form class="ppt-form login" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

    <?php do_action( 'woocommerce_login_form_start' ); ?>

    <?php echo ( $message ) ? wpautop( wptexturize( $message ) ) : ''; // @codingStandardsIgnoreLine ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            <input type="text" class="form-control" name="username" id="username" autocomplete="username" />
        </div>
        <div class="form-group col-md-6">
            <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            <input class="form-control" type="password" name="password" id="password" autocomplete="current-password" />
        </div>
    </div>


    <?php do_action( 'woocommerce_login_form' ); ?>

    <div class="form-row">
        <div class="form-group custom-control custom-checkbox">
            <input class="custom-control-input" name="rememberme" type="checkbox" id="rememberme" value="forever" />
            <label for="rememberme" class="custom-control-label"><span><?php esc_html_e( 'مرا به خاطر بسپار', 'ppttheme' ); ?></span></label>
        </div><!-- .form-group -->
        <div class="form-group">
            <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
            <button type="submit" class="ppt-login-submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
        </div><!-- .form-group -->
        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
    </div>
    <p class="lost_password">
        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
    </p>

    <div class="clear"></div>

    <?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
