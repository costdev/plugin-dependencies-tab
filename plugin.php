<?php
/**
 * Plugin Dependencies Tab
 *
 * @author  Andy Fragen
 * @license MIT
 * @link    https://github.com/afragen/plugin-dependencies-tab
 * @package plugin-dependencies-tab
 */

/**
 * Plugin Name: Plugin Dependencies Tab
 * Plugin URI: https://github.com/afragen/plugin-dependencies-tab
 * Description: Parses 'Requires Plugin' header, add plugin install dependencies tab, and information about dependencies.
 * Author: Andy Fragen
 * Version: 0.11.3
 * License: MIT
 * Network: true
 * Requires at least: 5.1
 * Requires PHP: 5.6
 * GitHub Plugin URI: afragen/plugin-dependencies-tab
 */

namespace Fragen\Plugin_Dependencies;

/**
 * Class Init
 */
class Init {

	/**
	 * Initialize, load filters, and get started.
	 *
	 * @return void
	 */
	public function __construct() {
		require_once __DIR__ . '/wp-admin/includes/class-wp-plugin-dependencies.php';

		add_filter( 'install_plugins_tabs', array( $this, 'add_install_tab' ), 10, 1 );
		add_filter( 'install_plugins_table_api_args_dependencies', array( $this, 'add_install_dependency_args' ), 10, 1 );
		add_action( 'install_plugins_dependencies', 'display_plugins_table' );
	}

	/**
	 * Add 'Dependencies' tab to 'Plugin > Add New'.
	 *
	 * @param array $tabs Array of plugin install tabs.
	 *
	 * @return array
	 */
	public function add_install_tab( $tabs ) {
		$tabs['dependencies'] = _x( 'Dependencies', 'Plugin Installer' );

		return $tabs;
	}

	/**
	 * Add args to plugins_api().
	 *
	 * @param array $args Array of arguments to plugins_api().
	 *
	 * @return array
	 */
	public function add_install_dependency_args( $args ) {
		$args = array(
			'page'     => 1,
			'per_page' => 36,
			'locale'   => get_user_locale(),
			'browse'   => 'dependencies',
		);

		return $args;
	}
}

new Init();
