<?php 
/**
 * @wordpress-plugin
 * Plugin Name:       Latests news
 * Plugin URI:        https://github.com/Rafa410/latest-news
 * Description:       Displays the latest news with an external link to read more
 * Version:           1.0
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * Author:            Rafa Soler
 * Author URI:        https://github.com/Rafa410
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       latest-news
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) or die;

define( 'LATEST_NEWS_DIR', plugin_dir_path( __FILE__ ) );

add_action( 'init', 'wpdocs_load_textdomain' );
function wpdocs_load_textdomain() {
  load_plugin_textdomain( 'latest-news', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

if ( is_admin() ) {
    require_once LATEST_NEWS_DIR . 'admin/latest-news-admin.php';
} else {
    require_once LATEST_NEWS_DIR . 'includes/main.php';
}
