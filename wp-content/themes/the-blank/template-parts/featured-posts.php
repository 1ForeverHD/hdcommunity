<?php
/**
 * Template part for displaying featured posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package the-blank
 */

$sticky_posts = get_option( 'sticky_posts' );
$count        = count( $sticky_posts );
$categories   = get_the_category();
?>
<div class="grid-1">
	<?php
		$args  = array(
			'post_type'      => 'post',
			'meta_key'       => 'special_box_check',
			'posts_per_page' => '1',
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
	<div class="the-blank-fc large col-sm-6 col-xs-6">
		<a class="the-blank-featured-overlay" href="<?php the_permalink(); ?>"></a>
		<div class="the-blank-featured-data">
			<div class="the-blank-featured-it">
				<img src="<?php the_post_thumbnail_url( 'large' ); ?>">
				<div class="the-blank-featured-title">
					<?php
					$category_object = get_the_category( get_the_ID() );
					$category_name   = $category_object[0]->name;
					if ( ! empty( $categories ) ) {
						echo '<span class="the-blank-featured-cat">' . esc_html( $category_name ) . '</span>';
					}
					?>
					<h2>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
					</div>
							</div>
						</div>
					</div>
				<?php
	endwhile;
endif;
		wp_reset_postdata();
		?>
</div>
<div class="grid-2">
	<?php
		$args  = array(
			'post_type'      => 'post',
			'meta_key'       => 'special_box_check',
			'posts_per_page' => 4,
			'offset'         => 1,
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
		<div class="the-blank-fc small col-sm-6 col-xs-6">
			<a class="the-blank-featured-overlay" href="<?php the_permalink(); ?>"></a>
			<div class="the-blank-featured-data">
				<div class="the-blank-featured-it">
					<img src="<?php the_post_thumbnail_url( 'large' ); ?>">
					<div class="the-blank-featured-title">
						<?php
						$category_object = get_the_category( get_the_ID() );
						$category_name   = $category_object[0]->name;
						if ( ! empty( $categories ) ) {
							echo '<span class="the-blank-featured-cat">' . esc_html( $category_name ) . '</span>';
						}
						?>
						<h2>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
					</div>
				</div>
			</div>
		</div>
				<?php
		endwhile;
			wp_reset_postdata();
		endif;
		?>
</div>
