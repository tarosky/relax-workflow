<?php

namespace Tarosky\RelaxWorkflow;

/**
 * Singleton pattern.
 *
 * @package rwf
 */
abstract class Singleton {

	/**
	 * @var static[] Instance holder.
	 */
	private static $instances = [];

	/**
	 * Executed in constructor.
	 */
	protected function init() {
		// Do something.
	}

	/**
	 * Constructor.
	 */
	final protected function __construct() {
		$this->init();
	}

	/**
	 * Get instance.
	 *
	 * @return static
	 */
	final public static function get_instance() {
		$class_name = get_called_class();
		if ( ! isset( self::$instances[ $class_name ] ) ) {
			self::$instances[ $class_name ] = new $class_name();
		}
		return self::$instances[ $class_name ];
	}
}
