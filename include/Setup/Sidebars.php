<?php


namespace Inc\Setup;


class Sidebars
{
    /**
     * Register wordpress default actions and filters
     */
    public function register() {
        add_action( 'widgets_init', [ $this, 'sidebars' ] );
    }

    public function sidebars() {
        $args = [
            'name'          => __( 'سایدبار فروشگاه', 'ppttheme' ),
            'id'            => 'shop',
            'description'   => __( 'سایدبار صفحه فروشگاه', 'ppttheme' ),
            'before_widget' => '<aside id="%1$" class="widget ppt-widget %2$">',
            'after_widget'  => '</aside>',
            'before_title'  => '',
            'after_title'   => '',
        ];

        register_sidebar( $args );
    }
}