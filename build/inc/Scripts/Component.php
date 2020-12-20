<?php
/**
 * KGTHEME\Scripts\Component class
 *
 * @package kgtheme
 */

namespace WpMunich\kgtheme\Scripts;
use WpMunich\kgtheme\Component_Interface;
use function add_action;

/**
 * A class to enqueue the needed scripts..
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() {
		return 'script';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Enqueue needed scripts.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'kgtheme-script', get_template_directory_uri() . '/script.min.js', array( 'jquery' ), KGTHEME_VERSION, true );

		$translation_array = array(
			'themeUrl' => get_template_directory_uri(),
			'restUrl'  => get_rest_url(),
		);
		wp_localize_script( 'kgtheme-script', 'kgtheme', $translation_array );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
