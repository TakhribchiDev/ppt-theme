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
            <div class="ppt-logo">
		        <?php svg( 'pardenegar' ); ?>
            </div><!-- .navbar-brand -->

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
                <button class="cart-btn">
                    <i class="ppt-icon ppt-cart"></i>
                </button>
                <button class="profile-btn">
                    <i class="ppt-icon ppt-profile"></i>
                    <span><?php esc_html_e( 'حساب کاربری', 'ppttheme' ) ?></span>
                </button>
            </div><!-- .auth-container -->
</header>