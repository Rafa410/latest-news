<?php 
/**
 * @wordpress-plugin
 * Plugin Name:       Latests news
 * Plugin URI:        https://github.com/Rafa410/latest-news
 * Description:       Displays the latest news with an external link to read more
 * Version:           0.1
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * Author:            Rafa Soler
 * Author URI:        https://github.com/Rafa410
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) or die;

define( 'LATEST_NEWS_DIR', plugin_dir_path( __FILE__ ) );

if ( is_admin() ) {
    require_once LATEST_NEWS_DIR . 'admin/latest-news-admin.php';
} else {
    require_once LATEST_NEWS_DIR . 'includes/main.php';
}
