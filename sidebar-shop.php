<?php
/**
 * PPT Theme Shop Sidebar
 *
 * @package ppttheme
 */

if ( ! is_active_sidebar( 'shop' ) ) :
    return;
endif;
?>

<div id="sidebar-shop" class="sidebar">
    <?php dynamic_sidebar( 'shop' ) ?>
</div>


