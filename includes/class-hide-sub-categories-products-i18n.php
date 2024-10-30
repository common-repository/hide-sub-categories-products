<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://topinfosoft.com/about
 * @since      1.0.0
 *
 * @package    Hide_Sub_Categories_Products
 * @subpackage Hide_Sub_Categories_Products/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Hide_Sub_Categories_Products
 * @subpackage Hide_Sub_Categories_Products/includes
 * @author     Top Infosoft <topinfosoft@gmail.com>
 */
class Hide_Sub_Categories_Products_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'hide-sub-categories-products',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
