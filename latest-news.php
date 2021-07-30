<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/Rafa410/latest-news
 * @since             1.0.0
 * @package           Latest_News
 *
 * @wordpress-plugin
 * Plugin Name:       Latest News
 * Plugin URI:        https://github.com/Rafa410/latest-news
 * Description:       Displays the latest news with an external link to read more
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * Author:            Rafa Soler
 * Author URI:        https://github.com/Rafa410
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       latest-news
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
define( 'LATEST_NEWS_VERSION', '1.0.0' );

define( 'LATEST_NEWS_DIR', plugin_dir_path( __FILE__ ) );
define( 'LN_POST_TYPE', 'news' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-latest-news-activator.php
 */
function activate_latest_news() {
	require_once LATEST_NEWS_DIR . 'includes/class-latest-news-activator.php';
	Latest_News_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-latest-news-deactivator.php
 */
function deactivate_latest_news() {
	require_once LATEST_NEWS_DIR . 'includes/class-latest-news-deactivator.php';
	Latest_News_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_latest_news' );
register_deactivation_hook( __FILE__, 'deactivate_latest_news' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require LATEST_NEWS_DIR . 'includes/class-latest-news.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_latest_news() {

	$plugin = new Latest_News();
	$plugin->run();

}
run_latest_news();
