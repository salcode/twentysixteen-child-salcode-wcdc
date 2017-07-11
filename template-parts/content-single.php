<?php
/**
 * The template part for displaying single posts.
 *
 * Child theme override template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen_fe_wcdc_childtheme
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		/**
		 * Get the color to use when displaying the title.
		 */
		$post_id = get_the_ID();
		$color   = get_post_meta( $post_id, 'fe_wcdc_color', true );
		if ( ! $color ) {
			// Fallback color is black.
			$color = '#000';
		}
	?>
	<header class="entry-header" style="color: <?php echo esc_attr( $color ); ?>;">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );

		// Display the subtitle if one is present in post meta.
		$post_id = get_the_ID();
		$subtitle = get_post_meta( get_the_ID(), 'fe_wcdc_subtitle', true );
		if ( $subtitle ) {
			echo '<h2 class="wcdc-entry-subtitle">' . esc_html( $subtitle ) . '</h2>';
		}
		?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();

			// Display the learn more URL if one is present in post meta.
			$post_id = get_the_ID();
			$url = get_post_meta( $post_id, 'fe_wcdc_learn_more', true );

			if ( $url ) {

				printf( '<a class="fe-wcdc-btn fe-wcdc-btn-learn-more" href="%1$s">%2$s</a>',
					// Replace %1$s with escaped version of URL.
					esc_url( $url ),
					// Replace %2$s with translated and escaped version of "Learn More".
					esc_html__( 'Learn More' )
				);

			}


			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
