<?php
/**
 * PPT Theme Sidebar
 *
 * @package ppttheme
 */

if ( ! is_active_sidebar( 'default-sidebar' ) ) :
    return;
endif;
?>

<div id="sidebar-default" class="sidebar ppt-sidebar">
    <?php dynamic_sidebar( 'default-sidebar' ) ?>
</div>


