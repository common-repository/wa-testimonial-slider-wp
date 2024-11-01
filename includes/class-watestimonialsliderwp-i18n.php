<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       webactualizable.com
 * @since      1.0.0
 *
 * @package    Watestimonialsliderwp
 * @subpackage Watestimonialsliderwp/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Watestimonialsliderwp
 * @subpackage Watestimonialsliderwp/includes
 * @author     Jordi Catà <jordi.cata@arambee.com>
 */
class Watestimonialsliderwp_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'watestimonialsliderwp',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
