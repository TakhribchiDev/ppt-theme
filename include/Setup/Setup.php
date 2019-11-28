<?php
/**
 * @package ppttheme
 */

namespace Inc\Setup;


class Setup {
	/**
	 * Register default hooks and actions for wordpress
	 */
	public function register() {
		add_action( 'after_setup_theme', [ $this, 'setup' ] );
		add_action( 'after_setup_theme', [ $this, 'content_width' ], 0 );
	}

	public function setup() {
		/*
		 *  Default theme support options
		 */
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Woocommerce support
		 */
		add_theme_support( 'woocommerce' );

		/*
		 * HTML5 support options
		 */
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'caption'
		] );
	}

	public function content_width() {
		$GLOBALS[ 'content_width' ] = apply_filters( 'content_width', 1440 );
	}
}