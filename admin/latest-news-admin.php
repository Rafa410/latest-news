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
