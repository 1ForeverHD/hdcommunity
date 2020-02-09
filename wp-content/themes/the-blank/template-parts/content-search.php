<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package the-blank
 */

?>

<article id="post-<?php the_ID(); ?>"
<?php
if ( ! is_single() ) {
	post_class( 'teaser' );
} else {
	post_class();
}
?>
>
	<?php if ( is_home() || is_front_page() || is_archive() || is_search() ) : ?>
		<?php
		if ( has_post_thumbnail() ) {
			echo '<figure><a href="' . esc_url( get_permalink() ) . '">';
			the_post_thumbnail( 'the-blank-teaser' );
			echo '</a></figure>';
		} else {
			echo '<figure><a href="' . esc_url( get_permalink() ) . '"><img src="' . esc_url( get_stylesheet_directory_uri() ) . '/assets/images/thumbnail-missing.png" /></a></figure>';
		}
		?>
	<?php endif; ?>
	<header class="entry-header">
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				blank_posted_on();
				blank_posted_by();
				?>
			</div>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php
		if ( is_single() ) {
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'the-blank' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
		} else {
			the_excerpt();
		}
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-blank' ),
					'after'  => '</div>',
				)
			);
			?>
	</div>
</article>

