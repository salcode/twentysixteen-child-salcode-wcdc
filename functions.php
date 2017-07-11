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



add_action( 'cmb2_admin_init', 'fe_wcdc_color_metabox' );

/**
 * Use CMB2 to create a color picker metabox for `fe_wcdc_color`.
 *
 * Requires: [CMB2 plugin](https://wordpress.org/plugins/cmb2/).
 */
function fe_wcdc_color_metabox() {
	$cmb = new_cmb2_box( array(
		'id'            => 'fe_wcdc_color_metabox',
		'title'         => esc_html__( 'Color Metabox', 'wcdc' ),
		'object_types'  => array( 'post' ), // Post type.
	) );

	$cmb->add_field( array(
		'name'       => esc_html__( 'Title Color', 'wcdc' ),
		'id'         => 'fe_wcdc_color',
		'type'       => 'colorpicker',
	) );
}
