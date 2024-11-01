<?php

/**
 *
 * @link              webactualizable.com
 * @since             1.0.2
 * @package           Watestimonialsliderwp
 *
 * @wordpress-plugin
 * Plugin Name:       Wa Testimonial Slider WP
 * Plugin URI:        https://www.webactualizable.com/plugin-wordpress-slider-testimonios-clientes-para-tu-web
 * Description:       Plugin to show a Bootstrap Testimonial slider for your website. You can add new testimonial, edit one, or delete one.
 * Version:           1.0.3
 * Author:            Jordi Catà
 * Author URI:        webactualizable.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       watestimonialsliderwp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.2 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WATESTIMONIALSLIDERWP_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-watestimonialsliderwp-activator.php
 */
function activate_watestimonialsliderwp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-watestimonialsliderwp-activator.php';
	Watestimonialsliderwp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-watestimonialsliderwp-deactivator.php
 */
function deactivate_watestimonialsliderwp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-watestimonialsliderwp-deactivator.php';
	Watestimonialsliderwp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_watestimonialsliderwp' );
register_deactivation_hook( __FILE__, 'deactivate_watestimonialsliderwp' );

//
//add_action('wp_ajax_vote_for_photo2',  'photo_vote_update');    //al clickar en votacions
//
//function photo_vote_update()
//{
//    echo "<br> photo_vote_update";
//
//}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-watestimonialsliderwp.php';


//
//add_action('wp_ajax_nopriv_notify_button_click', 'notify_button_click');
//// Función que procesa la llamada AJAX
//function notify_button_click(){
//    wp_send_json( array('message' => __('Message received, greetings from server!', 'wpduf') ) );
//}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_watestimonialsliderwp() {

	$plugin = new Watestimonialsliderwp();
	$plugin->run();

}
run_watestimonialsliderwp();
