<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Meta Pixie
 * Plugin URI:        https://www.bytepixie.com/meta-pixie/
 * Description:       List, filter, sort and view commentmeta, postmeta, sitemeta, termmeta and usermeta records, even serialized and base64 encoded values.
 * Version:           1.1
 * Author:            Byte Pixie
 * Author URI:        https://www.bytepixie.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       meta-pixie
 * Domain Path:       /languages
 * Network:           True
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-meta-pixie-activator.php
 */
function activate_meta_pixie() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-meta-pixie-activator.php';
	Meta_Pixie_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-meta-pixie-deactivator.php
 */
function deactivate_meta_pixie() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-meta-pixie-deactivator.php';
	Meta_Pixie_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_meta_pixie' );
register_deactivation_hook( __FILE__, 'deactivate_meta_pixie' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-meta-pixie.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */
function run_meta_pixie() {
	$plugin = new Meta_Pixie();
	$plugin->run();
}

run_meta_pixie();
