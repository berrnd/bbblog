<?php
/**
 * Implements the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @uses independent_publisher_get_default_header_image()
 */
function independent_publisher_custom_header_setup() {
	$args = array(
		'default-image'          => independent_publisher_get_default_header_image(),
		'width'                  => 100,
		'height'                 => 100,
		'flex-width'             => true,
		'flex-height'            => true,
		'header-text'            => false,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);

	$args = apply_filters( 'independent_publisher_custom_header_args', $args );

	add_theme_support( 'custom-header', $args );

}

add_action( 'after_setup_theme', 'independent_publisher_custom_header_setup' );

/**
 * A default header image
 *
 * Use the admin email's gravatar as the default header image.
 *
 * @since Independent Publisher 1.0
 */
function independent_publisher_get_default_header_image() {

	$url = 'https://berrnd.de/img/Bernd_Bestel_100px.jpg';
	return esc_url_raw( $url );
} // independent_publisher_get_default_header_image