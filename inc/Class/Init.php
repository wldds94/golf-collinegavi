<?php
namespace GolfGavi;

final class Init
{
	/**
	 * Store all the classes inside an array
	 * @since    1.0.0
	 * 
	 * @return array Full list of classes
	 */
	public static function get_services() 
	{
		return [
			// Base\ThemeSetup::class,
			Base\Enqueue::class,
			Base\Ajax::class,
			// Base\Template::class,
			// Services\AdminNotices::class,
			// Plugins\ACF\ACF::class,
			// Plugins\YoastSEO::class,
			ExternalsWidgets\ChronoGolf::class,
		];
	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @since    1.0.0
	 * 
	 * @return
	 */
	public static function register_services() 
	{
		foreach ( self::get_services() as $class ) {
			// Throw Error if Class NOT EXIST -> class_exists( '$' ) if you dont want
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @since    1.0.0
	 * 
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function instantiate( $class )
	{
		$service = new $class();

		return $service;
	}
}