<?php

add_action( 'wp_enqueue_scripts', 'fe_wcdc_post_meta_twentysixteen_childtheme_css' );

/**
 * Enqueue parent (twentysixteen) and child theme styles.
 */
function fe_wcdc_post_meta_twentysixteen_childtheme_css() {

	$parent_style = 'twentysixteen-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		wp_get_theme()->get( 'Version' )
	);
}
