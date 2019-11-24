<?php

namespace Inc;

final class Init {

	/**
	 * Store all the classes inside an array
	 *
	 * @return array Full list of theme classes
	 */
	public static function get_services() {

		return [
			Setup\Enqueue::class
		];
	}

	/**
	 * Loop through all classes, initialize theme and call register() method if exists
	 *
	 * @return
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );

			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 *
	 * @param class $class          class from the services array
	 *
	 * @return mixed instance       new instance of the class
	 */
	public static function instantiate( $class ) {
		return new $class;
	}
}