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

<div class="container">
    <div class="row">
        <div class="ppt-logo col-md-2">
            <?php svg( 'pardenegar' ); ?>
        </div><!-- .col-md-2-->
    </div><!-- .row-->
</div><!-- .container -->