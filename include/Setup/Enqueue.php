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

	}

}