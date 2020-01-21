<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="row">
    <div id="customer_login" class="col-md-6 ppt-auth-forms">

        <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

        <div class="ppt-tabs login-tabs">
            <a class="ppt-tab login-tab active" data-tab="#loginForm" role="button"><?php _e( 'ورود' ) ?></a>
            <a class="ppt-tab register-tab" data-tab="#registerForm" role="button"><?php _e( 'عضویت' ) ?></a>
        </div>

        <div id="loginForm" class="ppt-tab-content active">

            <?php endif; ?>

            <div class="form-image-wrapper">
                <img src="<?php echo img( 'lock.png' ) ?>" alt="">
            </div>

            <form class="ppt-form" method="post">

                <?php do_action( 'woocommerce_login_form_start' ); ?>

                <div class="form-group">
                    <label for="username" hidden="hidden"><?php esc_html_e( 'نام کاربری یا آدرس ایمیل', 'ppttheme' ); ?></label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="<?php esc_html_e('نام کاربری یا آدرس ایمیل', 'ppttheme'); ?>" /><?php // @codingStandardsIgnoreLine ?>
                </div>
                <div class="form-group">
                    <label for="password" hidden="hidden"><?php esc_html_e( 'گذرواژه', 'ppttheme' ); ?></label>
                    <input class="form-control" type="password" name="password" id="password" autocomplete="current-password" placeholder="<?php esc_html_e('گذرواژه', 'ppttheme'); ?>"/>
                </div>

                <?php do_action( 'woocommerce_login_form' ); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="custom-control custom-checkbox">
                            <input id="rememberme" class="custom-control-input" name="rememberme" type="checkbox" value="forever" />
                            <label for="rememberme" class="custom-control-label"><?php esc_html_e( 'مرا به خاطر بسپار', 'ppttheme' ); ?></label>
                        </div><!-- .custom-control -->
                    </div><!-- .col-md-6 -->
                    <div class="col-md-6">
                        <div class="form-text lost-password">
                            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'رمز عبور را فراموش کرده اید؟', 'ppttheme' ); ?></a>
                        </div>
                    </div><!-- .col-md-6 -->

                </div><!-- .row -->

                <div class="row">

                    <div class="col-md-4 m-auto">
                        <button type="submit" class="ppt-login-submit" name="login" value="<?php esc_attr_e( 'ورود', 'ppttheme' ); ?>"><?php esc_html_e( 'ورود', 'ppttheme' ); ?></button>
                    </div><!-- .col-md-12 -->

                </div><!-- .row -->
                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>



                <?php do_action( 'woocommerce_login_form_end' ); ?>

            </form>

        </div><!-- #loginForm -->

        <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>


            <div id="registerForm"  class="ppt-tab-content">

                <div class="form-image-wrapper">
                    <img src="<?php echo img( 'sign-up.png' ) ?>" alt="">
                </div>

                <form method="post" class="ppt-form" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

                    <?php do_action( 'woocommerce_register_form_start' ); ?>

                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                        <div class="form-group">
                            <label for="reg_username" hidden="hidden"><?php esc_html_e( 'نام کاربری', 'ppttheme' ); ?></label>
                            <input type="text" class="form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="<?php esc_html_e( 'نام کاربری', 'ppttheme' ); ?>" /><?php // @codingStandardsIgnoreLine ?>
                        </div>

                    <?php endif; ?>

                    <div class="form-group">
                        <label for="reg_email" hidden="hidden"><?php esc_html_e( 'آدرس ایمیل', 'ppttheme' ); ?></label>
                        <input type="email" class="form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" placeholder="<?php esc_html_e( 'آدرس ایمیل', 'ppttheme' ); ?>" /><?php // @codingStandardsIgnoreLine ?>
                    </div>

                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                        <div class="form-group">
                            <label for="reg_password" hidden="hidden"><?php esc_html_e( 'گذرواژه', 'woocommerce' ); ?></label>
                            <input type="password" class="form-control" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php esc_html_e( 'گذرواژه', 'ppttheme' ); ?>" />
                        </div>

                    <?php else : ?>

                        <p><?php esc_html_e( 'گذرواژه به آدرس ایمیل شما فرستاده خواهد شد.', 'ppttheme' ); ?></p>

                    <?php endif; ?>

                    <?php do_action( 'woocommerce_register_form' ); ?>

                    <div class="form-group row">
                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                        <div class="col-md-5 m-auto">
                        <button type="submit" class="ppt-register-submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                        </div><!-- .col-md-5 -->
                    </div>

                    <?php do_action( 'woocommerce_register_form_end' ); ?>

                </form>

            </div><!-- #registerForm -->

        <?php endif; ?>

    </div><!-- .col-md-6 -->

    <div class="col-md-6">

        <?php
        $slides = [
            [
                'image' => 'discuss'
            ],
            [
                'image' => 'designing'
            ],
            [
                'image' => 'design-desk'
            ],
            [
                'image' => 'presentation'
            ],
            [
                'image' => 'projector'
            ],
            [
                'image' => 'screens'
            ]
        ];
        ?>

        <div id="authSlider" class="ppt-homepage-slider ppt-slider carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php for ( $j = 0; $j < sizeof( $slides ); $j++ ) : ?>
                    <li data-target="#authSlider" data-slide-to="<?php echo $j ?>" class="<?php echo ( $j == 0 ? 'active' : '' ); ?>"></li>
                <?php endfor; ?>
            </ol>
            <div class="carousel-inner">

                <?php $i = 0; foreach ( $slides as $slide ) : ?>
                    <div class="carousel-item <?php echo ( $i == 0 ? 'active' : '' ); ?>">
                        <div class="d-block w-100 carousel-slide background-image" style="background-image: url('<?php echo get_template_directory_uri() . '/img/slider/' . $slide['image'] . '.jpg'; ?>')"></div>
                    </div><!-- .carousel-item -->
                    <?php $i++; endforeach; ?>

            </div><!-- .carousel-inner -->

            <a href="#authSlider" class="carousel-control-prev" role="button" data-slide="prev">
                <i class="ppt-icon ppt-chevron-left-thin"></i>
                <span class="sr-only">قبلی</span>
            </a>

            <a href="#authSlider" class="carousel-control-next" role="button" data-slide="next">
                <i class="ppt-icon ppt-chevron-right-thin"></i>
                <span class="sr-only">بعدی</span>
            </a>

        </div><!-- #authSlider -->

    </div><!-- .col-md-6 -->

</div><!-- .row -->

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
