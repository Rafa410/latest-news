<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/Rafa410/latest-news
 * @since      1.0.0
 *
 * @package    Latest_News
 * @subpackage Latest_News/public/partials
 */
?>

<div class="latest-news">
    <?php
    $loop = new WP_Query( array(
        'post_type' => LN_POST_TYPE,
        'posts_per_page' => 3,
    ) );
    while ( $loop->have_posts() ) {
        $loop->the_post();
        ?>
        <div class="ln-section">
            <a class="ln-link" href="<?= get_post_custom()['url'][0] ?>" target="_blank" rel="noopener noreferrer">
                <span></span>
            </a>
            <div class="ln-content">
                <div class="ln-layer">
                    <span class="ln-title"><?= get_the_title() ?></span>
                    <span class="ln-description"><?= get_the_content() ?></span>
                    <span class="ln-button"><?= __( 'Read more', 'latest-news' ) ?></span>
                </div>
            </div>
            <div class="ln-background">
                <?= get_the_post_thumbnail() ?>
            </div>
        </div>
    <?php } ?>
</div>
