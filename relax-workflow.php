<?php
/**
Plugin Name: Relax Workflow
Description: Simple and easy workflow. Useful in WordPress of a media team.
Plugin URI: https://wordpress.org/plugins/relax-workflow/
Author: Tarosky INC.
Version: nightly
Author URI: https://tarosky.co.jp/
License: GPL3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: relax-workflow
Domain Path: /languages
 */

defined( 'ABSPATH' ) or die();

/**
 * Initializer.
 */
function rwf_init() {
	// Load text domain.
	load_plugin_textdomain( 'relax-workflow', false, basename( __DIR__ ) . '/languages' );
	// Initialize.
	$autoloader = __DIR__ . '/vendor/autoload.php';
	if ( file_exists( $autoloader ) ) {
		require $autoloader;
		Tarosky\RelaxWorkflow\Bootstrap::get_instance();
	}
}
add_action( 'plugin_loaded', 'rwf_init' );

/**
 * Get plugin version.
 *
 * @return string
 */
function rwf_version() {
	static $version = '';
	if ( $version ) {
		return $version;
	}
	$info    = get_file_data( __FILE__, [
		'version' => 'Version',
	] );
	$version = $info['version'];
	return $version;
}

/**
 * Get plugin root url.
 *
 * @return string
 */
function rwf_url() {
	return untrailingslashit( plugin_dir_url( __FILE__ ) );
}

/**
 * Get plugin root directory.
 *
 * @return string
 */
function rwf_root_dir() {
	return __DIR__;
}
