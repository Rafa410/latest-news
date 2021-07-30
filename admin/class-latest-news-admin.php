<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/Rafa410/latest-news
 * @since      1.0.0
 *
 * @package    Latest_News
 * @subpackage Latest_News/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Latest_News
 * @subpackage Latest_News/admin
 * @author     Rafa Soler <rafasoler10@gmail.com>
 */
class Latest_News_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/latest-news-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/latest-news-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function create_custom_post_type() {

		$args = array(
			'label'				=> __('News', 'latest-news'),
			'public'			=> false,
			'show_ui'			=> true,
			'supports'			=> array('title', 'thumbnail', 'editor' ),
			'menu_icon'			=> 'dashicons-format-aside',
		);
		register_post_type( LN_POST_TYPE, $args );

	}

	public function add_meta_box() {
		
		add_meta_box(
			'external_link_meta',
			__( 'Read more URL', 'latest-news' ),
			array( $this, 'external_link' ),
			LN_POST_TYPE,
			'side'
		);

	}

	public function external_link() {

		global $post;
		$news = get_post_custom( $post->ID );
		$url = $news['url'][0];
		?>
		<label for="url"><?= __( 'URL', 'latest-news' ) ?>:</label>
		<input id="url" name="url" type="url" value="<?= $url ?>">
		<?php

	}

	public function update_url() {

		global $post;
		update_post_meta( $post->ID, 'url', $_POST['url'] );

	}

}
