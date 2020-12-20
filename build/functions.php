<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kgtheme
 */

if ( ! defined( 'KGTHEME_SLUG' ) ) {
	define( 'KGTHEME_SLUG', '<%= pkg.slug %>' );
}

if ( ! defined( 'KGTHEME_VERSION' ) ) {
	define( 'KGTHEME_VERSION', '<%= pkg.version %>' );
}

require get_template_directory() . '/vendor/autoload.php';

// Load the `wp_kgtheme()` entry point function.
require get_template_directory() . '/inc/functions.php';

// Initialize the theme.
call_user_func( 'WpMunich\kgtheme\wp_kgtheme' );
