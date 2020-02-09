<?php
/**
 * Blank functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package the-blank
 */

if ( ! function_exists( 'blank_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blank_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Blank, use a find and replace
		 * to change 'the-blank' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'the-blank', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'the-blank-teaser', 391, 250, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'the-blank' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'blank_custom_background_args',
				array(
					'default-color' => 'f9fafc',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 65,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'blank_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blank_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'blank_content_width', 640 );
}
add_action( 'after_setup_theme', 'blank_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blank_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'the-blank' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'the-blank' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title-style"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
}
add_action( 'widgets_init', 'blank_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blank_scripts() {
	wp_enqueue_style( 'the-blank-style', get_stylesheet_uri(), array(), '1.0.7' );

	wp_enqueue_style( 'the-blank-font-icons', get_template_directory_uri() . '/assets/css/blank.css', array(), '1.0.7' );

	wp_enqueue_script( 'the-blank-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '1.0.7', true );

	wp_enqueue_script( 'the-blank-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '1.0.7', true );

	// Loading screen reader text.
	wp_localize_script(
		'the-blank-navigation',
		'blank_ScreenReaderText',
		array(
			'expand'   => __( 'Expand child menu', 'the-blank' ),
			'collapse' => __( 'Collapse child menu', 'the-blank' ),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blank_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Modify Excerpt Lenght.
 *
 * @param Length $length -- The new string length value.
 */
function blank_excerpt_length( $length ) {
	if ( ! is_admin() ) {
		return 45;
	}
}
add_filter( 'excerpt_length', 'blank_excerpt_length', 999 );


/**
 * Modify The Excerpt More.
 *
 * @param More $more -- The new Read More string value.
 */
function blank_excerpt_more( $more ) {
	global $post;
	if ( is_admin() ) {
		return $more; }
	return '&#46;&#46;&#46;';
}
add_filter( 'excerpt_more', 'blank_excerpt_more' );


/**
 * We're going to pop off the paged breadcrumb and add in our own thing.
 *
 * @param blank_trail $trail the breadcrumb_trail object after it has been filled.
 */
function blank_remove_current_item( $trail ) {
	// Check to ensure the breadcrumb we're going to play with exists in the trail.
	if ( isset( $trail->breadcrumbs[0] ) && $trail->breadcrumbs[0] instanceof bcn_breadcrumb ) {
		$types = $trail->breadcrumbs[0]->get_types();
		// Make sure we have a type and it is a current-item.
		if ( is_array( $types ) && in_array( 'current-item', $types ) ) {
			// Shift the current item off the front.
			array_shift( $trail->breadcrumbs );
		}
	}
}
add_action( 'bcn_after_fill', 'blank_remove_current_item' );





/**
 * Adding Featured Post Check Box.
 */
function blank_add_featured_slide() {
	$ctptypes = array( 'post', 'page', 'your_custom_post_type' );
	foreach ( $ctptypes as $ctptype ) {
		add_meta_box( 'blank-featured-slide', 'Featured Post', 'blank_featured_slide_func', $ctptype, 'side', 'high' );
	}
}
add_action( 'add_meta_boxes', 'blank_add_featured_slide' );

/**
 * Define Featured Post Check/Meta Box.
 *
 * @param Post $post helps to hold the post id.
 */
function blank_featured_slide_func( $post ) {
	$values = get_post_custom( $post->ID );
	$check  = isset( $values['blank_special_box_check'] ) ? esc_attr( $values['blank_special_box_check'][0] ) : '';
	wp_nonce_field( 'my_featured_slide_nonce', 'featured_slide_nonce' );
	?>
	<p>
		<input type="checkbox" name="blank_special_box_check" id="blank_special_box_check" <?php checked( $check, 'on' ); ?> />
		<label for="blank_special_box_check"><?php echo esc_html_e( 'Feature this post?', 'the-blank' ); ?></label>
	</p>
	<?php
}

/**
 * Save Featured Post Check/Meta Box with the Post Update.
 *
 * @param Post_id $post_id helps to hold the post id.
 */
function blank_featured_slide_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	$blank_featured_slide_nounce_san = wp_unslash( isset( $_POST['blank_featured_slide_nonce'] ) ); // Input var okay.
	if ( ! $blank_featured_slide_nounce_san || wp_verify_nonce( $blank_featured_slide_nounce_san ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post' ) ) {
		return;
	}
	$allowed                          = array(
		'a' => array(
			'href' => array(),
		),
	);
	$blank_special_box_check_san      = wp_unslash( isset( $_POST['blank_special_box_check'] ) ); // Input var okay.
	$post_blank_special_box_check_san = sanitize_text_field( wp_unslash( $_POST['blank_special_box_check'] ) ); // Input var okay.

	if ( $blank_special_box_check_san && $post_blank_special_box_check_san ) {
		add_post_meta( $post_id, 'blank_special_box_check', 'on', true );
	} else {
		delete_post_meta( $post_id, 'blank_special_box_check' );
	}
}
add_action( 'save_post', 'blank_featured_slide_save' );
