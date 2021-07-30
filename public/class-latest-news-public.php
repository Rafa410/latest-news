<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/Rafa410/latest-news
 * @since      1.0.0
 *
 * @package    Latest_News
 * @subpackage Latest_News/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Latest_News
 * @subpackage Latest_News/public
 * @author     Rafa Soler <rafasoler10@gmail.com>
 */
class Latest_News_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Latest_News_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Latest_News_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/latest-news-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Latest_News_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Latest_News_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/latest-news-public.js', array(), $this->version, true );

	}

	/**
	 * Adds a new shortcode.
	 *
	 * @since    1.0.0
	 */
	public function add_shortcode() {

		add_shortcode( $this->plugin_name, array( $this, 'generate_shortcode' ) );

	}

	/**
	 * Generates the content of the shortcode.
	 *
	 * @since    1.0.0
	 */
	public function generate_shortcode() {

		ob_start();

		require LATEST_NEWS_DIR . 'public/partials/latest-news-public-display.php';
		$buffer = ob_get_contents();

		ob_end_clean();

		return $buffer;

	}

}
