<?php
/**
 * PPT User Profile Info
 *
 * @package ppttheme
 */

global $current_user;
wp_get_current_user();

?>
<div class="ppt-user-info">
    <?php
    echo get_avatar( $current_user, 128 );
    ?>

    <p class="user-nickname" >
        <?php
        echo $current_user->display_name;
        ?>
    </p>

    <p class="user-name" >
        <?php
        echo $current_user->first_name . ' ' . $current_user->last_name;
        ?>
    </p>

    <p class="user-email" >
        <?php
        echo $current_user->user_email;
        ?>
    </p>
</div>