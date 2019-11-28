<?php
/**
 * @package ppttheme
 */

namespace Inc\Setup;


class Menus {
	/**
	 * Register default hooks and actions for wordpress
	 */
	public function register() {
		add_action( 'after_setup_theme', [ $this, 'menus' ] );
	}

	public function menus() {
		// Register all menus
		register_nav_menus([
			'header-primary' => esc_html__( 'منوی اصلی هدر', 'ppttheme' ),
			'footer-primary' => esc_html__( 'منوی اصلی فوتر', 'ppttheme' ),
			'footer-secondary' => esc_html__( 'منوی جانبی فوتر', 'ppttheme' ),
		]);
	}
}