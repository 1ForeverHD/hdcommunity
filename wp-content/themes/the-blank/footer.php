<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package the-blank
 */

?>
	</div><!-- .wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="wrap">
			<div class="site-info">
				<div class="left">
					<?php
					esc_html_e( 'Copyright &copy;&nbsp;', 'the-blank' );
					echo bloginfo();
					?>
					<?php
					if ( function_exists( 'the_privacy_policy_link' ) ) {
						the_privacy_policy_link( '<span class="privacy-policy">', '</span>' );
					}
					?>
				</div>
				<div class="right">
					<p>
						<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( '<a href="' . esc_url( 'https://shieldthemes.com/' ) . '" target="_blank">Designed with &#10084; by ShiledThemes</a>' );
						?>
					</p>
				</div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
