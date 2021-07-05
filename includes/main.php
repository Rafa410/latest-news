<?php

defined( 'ABSPATH' ) or die;

add_action( 'init', 'ln_add_shortcodes' );
function ln_add_shortcodes() {
    add_shortcode('latest-news', 'ln_generate_shortcode');
}

function ln_generate_shortcode( $atts = [], $content = null) {
    $o = '';
    $o .= '<div class="latest-news">';
    $args = array (
        'post_type' => 'news',
        'posts_per_page' => 3,
    );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) {
        $loop->the_post();
        $o .=   '<div class="ln-section">';
        $o .=       '<a class="ln-link" href="' . '#' . '" target="_blank" rel="noopener noreferrer"><span></span></a>';
        $o .=       '<div class="ln-content">';
        $o .=           '<div class="ln-layer">';
        $o .=               '<span class="ln-title">' . get_the_title() . '</span>';
        $o .=               '<span class="ln-description">' . get_the_content() . '</span>';
        $o .=               '<span class="ln-button">' . __( 'Leer más' ) . '</span>';
        $o .=           '</div>';
        $o .=       '</div>';
        $o .=       '<div class="ln-background">' . get_the_post_thumbnail() . '</div>';
        $o .=   '</div>';
    }
    $o .= '</div>';

    return $o;
}
