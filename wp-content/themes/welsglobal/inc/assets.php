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
	$script_path     = WELSGLOBAL_THEME_PATH . '/assets/src/app.js';

	wp_enqueue_style(
		'welsglobal-fonts',
		'https://fonts.googleapis.com/css2?family=Marcellus&family=Montserrat:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	if ( file_exists( $stylesheet_path ) ) {
		wp_enqueue_style(
			'welsglobal',
			WELSGLOBAL_THEME_URL . '/assets/dist/app.css',
			array( 'welsglobal-fonts' ),
			(string) filemtime( $stylesheet_path )
		);
	}

	if ( file_exists( $script_path ) ) {
		$script_dependencies = array();

		if ( class_exists( 'WooCommerce' ) ) {
			wp_enqueue_script(
				'welsglobal-qrcode',
				plugins_url( 'woocommerce/assets/js/jquery-qrcode/jquery.qrcode.min.js' ),
				array( 'jquery' ),
				(string) filemtime( WP_PLUGIN_DIR . '/woocommerce/assets/js/jquery-qrcode/jquery.qrcode.min.js' ),
				true
			);
			$script_dependencies[] = 'welsglobal-qrcode';
		}

		wp_enqueue_script(
			'welsglobal',
			WELSGLOBAL_THEME_URL . '/assets/src/app.js',
			$script_dependencies,
			(string) filemtime( $script_path ),
			true
		);
		wp_add_inline_script(
			'welsglobal',
			'window.welsglobalHome = ' . wp_json_encode( trailingslashit( home_url( '/' ) ) ) . ';'
			. 'window.welsglobalCheckout = ' . wp_json_encode(
				array(
					'ajaxUrl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'welsglobal_custom_checkout' ),
				)
			) . ';',
			'before'
		);
	}
}
add_action( 'wp_enqueue_scripts', 'welsglobal_enqueue_assets' );
