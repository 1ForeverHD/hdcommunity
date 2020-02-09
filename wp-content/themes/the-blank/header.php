<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package the-blank
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the-blank' ); ?></a>
	<header id="masthead" class="site-header" style="background-image: url('<?php header_image(); ?>')">
		<div class="wrap">
			<div class="site-branding">
				<?php the_custom_logo(); ?>
				<?php if ( is_front_page() && is_home() ) : ?>
					<div class="siteinfo-on">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
						<?php
						$blank_description = get_bloginfo( 'description', 'display' );
						if ( $blank_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $blank_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				<?php else : ?>
					<div class="siteinfo-on">
						<p class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</p>
						<?php
						$blank_description = get_bloginfo( 'description', 'display' );
						if ( $blank_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $blank_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'the-blank' ); ?></button>
				<?php
				if ( has_nav_menu( 'menu-1' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
				} else if ( current_user_can( 'edit_theme_options' ) ) {
					echo '<p class="assign-menu">';
					echo esc_html_e( 'Please Assign Menu', 'the-blank' );
					echo '</p>';
				}
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<?php
		$args  = array(
			'post_type' => 'post',
			'meta_key'  => 'special_box_check',
		);
		$query = new WP_Query( $args );
		if ( null != $query ) {
			if ( is_home() || is_front_page() ) {
				echo '<div class="featured-content wrap">';
					get_template_part( 'template-parts/featured-posts', 'posts' );
				echo '</div>';
			}
		}
		?>

	<div id="content" class="site-content">
		<div class="wrap">
