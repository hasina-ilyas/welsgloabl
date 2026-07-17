<?php
/**
 * Theme assets.
 *
 * @package WELSGLOBAL
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue the compiled frontend assets when they exist.
 *
 * @return void
 */
function welsglobal_enqueue_assets() {
	$stylesheet_path = WELSGLOBAL_THEME_PATH . '/assets/dist/app.css';
	$script_path     = WELSGLOBAL_THEME_PATH . '/assets/dist/app.js';

	if ( file_exists( $stylesheet_path ) ) {
		wp_enqueue_style(
			'welsglobal',
			WELSGLOBAL_THEME_URL . '/assets/dist/app.css',
			array(),
			(string) filemtime( $stylesheet_path )
		);
	}

	if ( file_exists( $script_path ) ) {
		wp_enqueue_script(
			'welsglobal',
			WELSGLOBAL_THEME_URL . '/assets/dist/app.js',
			array(),
			(string) filemtime( $script_path ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'welsglobal_enqueue_assets' );
