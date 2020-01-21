<?php
/**
 * PPT Theme header
 *
 * @package ppttheme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta charset="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<header class="container header-container">
    <a href="<?php echo get_home_url(); ?>" class="ppt-logo">
        <?php svg( 'pardenegar' ); ?>
    </a><!-- .navbar-brand -->

    <nav class="navbar ppt-navbar">
        <?php
        wp_nav_menu([
            'theme_location' => 'header-primary',
            'menu_class' => 'nav navbar-nav ppt-nav',
            'walker'    => new Inc\Core\WalkerNav()
        ]);
        ?>
    </nav>

    <div class="ppt-search-form">
        <?php
        get_search_form();
        ?>
    </div><!-- .search-form-container -->

    <div class="ppt-auth">
        <div class="cart-dropdown">
            <a href="#" id="cartDropdown" class="cart-btn dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="-110,20" >
                <div class="ppt-sdotus sdotus-green <?php echo ( ( ! WC()->cart->is_empty() ) ? 'active' : '' ); ?>"></div>
                <i class="ppt-icon ppt-cart"></i>
            </a>

            <div class="dropdown-menu ppt-dropdown" aria-labelledby="cartDropdown">
                <div class="mini-cart">
                    <?php woocommerce_mini_cart(); ?>
                </div>
            </div>
        </div><!-- .cart-dropdown -->

        <div class="profile-dropdown">
            <a id="profileDropdown" href="#" class="profile-btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="-110,20" >
                <i class="ppt-icon ppt-profile"></i>
                <span><?php esc_html_e( 'حساب کاربری', 'ppttheme' ) ?></span>
            </a>

            <div class="dropdown-menu ppt-dropdown" aria-labelledby="profileDropdown">
                <?php if ( is_user_logged_in() ) : ?>
                    <a class="dropdown-item" href="<?php echo wc_get_account_endpoint_url(''); ?>"><i class="ppt-icon ppt-dashboard"></i><span><?php esc_html_e('داشبورد', 'ppttheme') ?></span></a>
                    <a class="dropdown-item" href="<?php echo wc_get_account_endpoint_url('orders'); ?>"><i class="ppt-icon ppt-cart"></i><span><?php esc_html_e('سفارش ها', 'ppttheme') ?></span></a>
                    <a class="dropdown-item" href="<?php echo wc_get_account_endpoint_url('downloads'); ?>"><i class="ppt-icon ppt-download"></i><span><?php esc_html_e('دانلود ها', 'ppttheme') ?></span></a>
                    <a class="dropdown-item" href="<?php echo wc_get_account_endpoint_url('edit-account'); ?>"><i class="ppt-icon ppt-profile-stat"></i><span><?php esc_html_e('ویرایش حساب کاربری', 'ppttheme') ?></span></a>
                    <a class="dropdown-item" href="<?php echo wc_get_account_endpoint_url('customer-logou'); ?>"><i class="ppt-icon ppt-chevron-right"></i><span><?php esc_html_e('خروج', 'ppttheme') ?></span></a>
                <?php endif; ?>
                <div class="profile dropdown-login-form">
                    <?php woocommerce_login_form(); ?>
                </div>
            </div>

        </div><!-- .profile-dropdown -->

    </div><!-- .auth-container -->
</header>