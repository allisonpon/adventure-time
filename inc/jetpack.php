<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Adventure Time
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function adventure_time_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'adventure_time_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function adventure_time_jetpack_setup
add_action( 'after_setup_theme', 'adventure_time_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function adventure_time_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function adventure_time_infinite_scroll_render
