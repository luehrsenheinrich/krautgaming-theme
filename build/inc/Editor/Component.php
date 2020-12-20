<?php
/**
 * WP_Rig\WP_Rig\Editor\Component class
 *
 * @package kgtheme
 */

namespace WpMunich\kgtheme\Editor;

use WpMunich\kgtheme\Component_Interface;
use function add_action;
use function add_theme_support;

/**
 * Class for integrating with the block editor.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'editor';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'action_add_editor_support' ) );
	}

	/**
	 * Adds support for various editor features.
	 */
	public function action_add_editor_support() {
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for wide-aligned images.
		add_theme_support( 'align-wide' );

		/**
		 * Add support for color palettes.
		 *
		 * To preserve color behavior across themes, use these naming conventions:
		 * - Use primary and secondary color for main variations.
		 * - Use `theme-[color-name]` naming standard for standard colors (red, blue, etc).
		 * - Use `custom-[color-name]` for non-standard colors.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-colors' );
		 */
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'kgtheme' ),
					'slug'  => 'primary',
					'color' => '#26b8ff',
				),
				array(
					'name'  => __( 'Secondary', 'kgtheme' ),
					'slug'  => 'secondary',
					'color' => '#c60f7b',
				),
				array(
					'name'  => __( 'Tertiary', 'kgtheme' ),
					'slug'  => 'tertiary',
					'color' => '#141b41',
				),
				array(
					'name'  => __( 'Black', 'kgtheme' ),
					'slug'  => 'black',
					'color' => '#000000',
				),
				array(
					'name'  => __( 'Gray Darker', 'kgtheme' ),
					'slug'  => 'gray-darker',
					'color' => '#001926',
				),
				array(
					'name'  => __( 'Gray Dark', 'kgtheme' ),
					'slug'  => 'gray-dark',
					'color' => '#334751',
				),
				array(
					'name'  => __( 'Gray', 'kgtheme' ),
					'slug'  => 'gray',
					'color' => '#66757d',
				),
				array(
					'name'  => __( 'Gray Light', 'kgtheme' ),
					'slug'  => 'gray-light',
					'color' => '#99a3a8',
				),
				array(
					'name'  => __( 'Gray Lighter', 'kgtheme' ),
					'slug'  => 'gray-lighter',
					'color' => '#ccd1d4',
				),
				array(
					'name'  => __( 'White', 'kgtheme' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
			)
		);

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'kgtheme' ),
					'shortName' => __( 'S', 'kgtheme' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Medium', 'kgtheme' ),
					'shortName' => __( 'M', 'kgtheme' ),
					'size'      => 25,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'kgtheme' ),
					'shortName' => __( 'L', 'kgtheme' ),
					'size'      => 31,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Larger', 'kgtheme' ),
					'shortName' => __( 'XL', 'kgtheme' ),
					'size'      => 39,
					'slug'      => 'larger',
				),
			)
		);

		add_theme_support( 'disable-custom-colors' );
		add_theme_support( 'disable-custom-font-sizes' );
	}
}
