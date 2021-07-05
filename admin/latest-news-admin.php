<?php

defined( 'ABSPATH' ) or die;

add_action( 'init', 'ln_create_custom_post_type' );
if ( !function_exists( 'ln_create_custom_post_type' ) ) {
	function ln_create_custom_post_type() {
		$args = array (
			'label'				=> __('News', 'latest-news'),
			'public'			=> false,
			'show_ui'			=> true,
			'supports'			=> array('title', 'thumbnail', 'editor' ),
			'menu_icon'			=> 'dashicons-format-aside',
		);
		register_post_type( 'news', $args );
	}
}

add_action( 'admin_init', 'ln_admin_init' );
add_action('save_post', 'ln_update_url');

function ln_admin_init() {
  add_meta_box( 'external_link_meta', __( 'Read more URL' ), 'ln_external_link', 'news', 'side' );
}
 
function ln_external_link() {
  global $post;
  $news = get_post_custom( $post->ID );
  $url = $news['url'][0];
  ?>
  <label for="url"><?= __( 'URL' ) ?>:</label>
  <input id="url" name="url" type="url" value="<?= $url ?>">
  <?php
}

function ln_update_url() {
	global $post;
	update_post_meta( $post->ID, 'url', $_POST['url'] );
}
