<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://topinfosoft.com/about
 * @since             1.0.0
 * @package           Hide_Sub_Categories_Products
 *
 * @wordpress-plugin
 * Plugin Name:       Hide sub categories products
 * Plugin URI:        http://www.topinfosoft.com/wordpress-plugin-development/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Top Infosoft
 * Author URI:        http://topinfosoft.com/about
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hide-sub-categories-products
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HIDE_SUB_CATEGORIES_PRODUCTS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hide-sub-categories-products-activator.php
 */
function activate_hide_sub_categories_products() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hide-sub-categories-products-activator.php';
	Hide_Sub_Categories_Products_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hide-sub-categories-products-deactivator.php
 */
function deactivate_hide_sub_categories_products() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hide-sub-categories-products-deactivator.php';
	Hide_Sub_Categories_Products_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_hide_sub_categories_products' );
register_deactivation_hook( __FILE__, 'deactivate_hide_sub_categories_products' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hide-sub-categories-products.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_hide_sub_categories_products() {

	$plugin = new Hide_Sub_Categories_Products();
	$plugin->run();

}
run_hide_sub_categories_products();

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    function wchscp_excludeChildCategory($wp_query) 
    {
        if (isset($wp_query->query_vars['product_cat']) && $wp_query->is_main_query()) 
        {
            $wp_query->set('tax_query', array(
                array (
                    'taxonomy' => 'product_cat',
                    'terms' => $wp_query->query_vars['product_cat'],
                    'field' => 'slug',
                    'include_children' => false
                )
            )
        );
        }
    }
    add_filter('pre_get_posts', 'wchscp_excludeChildCategory');
}