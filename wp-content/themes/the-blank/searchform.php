<?php
/**
 * Custom Search Form for Blank Theme
 *
 * @package the-blank
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search this website &hellip;', 'placeholder', 'the-blank' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="<?php echo esc_attr( $unique_id ); ?>" />
	<button type="submit" class="search-button"><div class="icon-search"></div></button>
</form>
