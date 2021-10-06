<?php

namespace Tarosky\RelaxWorkflow;

use Tarosky\RelaxWorkflow\Controller\Settings;
use Tarosky\RelaxWorkflow\Controller\Statuses;

/**
 * Bootstrap plugin.
 *
 * @package rwf
 */
class Bootstrap extends Singleton {

	/**
	 * Register hooks.
	 */
	protected function init() {
		// Register status.
		Settings::get_instance();
		Statuses::get_instance();
		// Enqueue assets.
		add_action( 'init', [ $this, 'register_assets' ], 20 );
	}

	/**
	 * Register assets.
	 */
	public function register_assets() {
		$json = rwf_root_dir() . '/wp-dependencies.json';
		if ( ! file_exists( $json ) ) {
			return;
		}
		$setting = json_decode( file_get_contents( $json ), true );
		if ( ! $setting ) {
			return;
		}
		foreach ( $setting as $asset ) {
			if ( ! empty( $asset['path'] ) ) {
				continue;
			}
			switch ( $asset['ext'] ) {
				case 'js':
					wp_register_script( $asset['handle'], rwf_url() . '/' . $asset['path'], $asset['deps'], $asset['hash'], $asset['footer'] );
					break;
				case 'css':
					wp_register_style( $asset['handle'], rwf_url() . '/' . $asset['path'], $asset['deps'], $asset['hash'], $asset['media'] );
					break;
				default:
					// Do nothing.
					break;
			}
		}
	}
}
