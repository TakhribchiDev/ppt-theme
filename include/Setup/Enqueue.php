<?php

namespace Inc\Setup;

class Enqueue {
	/**
	 * Register default hooks and actions for wordpress
	 */
	public function register() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	public function enqueue_admin_scripts() {

	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', [], '4.3.1', 'all');
		wp_enqueue_style( 'ppt', get_template_directory_uri() . '/css/ppt.min.css', [], '1.0.0', 'all');

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.4.1.js', [], '3.4.1', true );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', [ 'jquery' ], '4.3.1', true );
		wp_enqueue_script( 'ppt', get_template_directory_uri() . '/js/ppt.min.js', [ 'jquery' ], '1.0.0', true );
	}
}