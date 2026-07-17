<?php
/**
 * Theme setup.
 *
 * @package WELSGLOBAL
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme supports and navigation menus.
 *
 * @return void
 */
function welsglobal_theme_setup() {
	load_theme_textdomain( 'welsglobal', WELSGLOBAL_THEME_PATH . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'woocommerce' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'welsglobal' ),
			'footer'  => __( 'Footer Navigation', 'welsglobal' ),
		)
	);
}
add_action( 'after_setup_theme', 'welsglobal_theme_setup' );
