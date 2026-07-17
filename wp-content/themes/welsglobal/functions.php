<?php
/**
 * WELSGLOBAL theme bootstrap.
 *
 * @package WELSGLOBAL
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WELSGLOBAL_THEME_VERSION', '0.1.0' );
define( 'WELSGLOBAL_THEME_PATH', get_template_directory() );
define( 'WELSGLOBAL_THEME_URL', get_template_directory_uri() );

require_once WELSGLOBAL_THEME_PATH . '/inc/setup.php';
require_once WELSGLOBAL_THEME_PATH . '/inc/assets.php';
