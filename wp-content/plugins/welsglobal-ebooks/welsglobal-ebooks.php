<?php
/**
 * Plugin Name: WELSGLOBAL eBooks
 * Description: Custom eBook checkout, payment workflow, administration, email, and secure delivery features.
 * Version: 0.1.0
 * Requires at least: 6.5
 * Requires PHP: 8.1
 * Text Domain: welsglobal-ebooks
 *
 * @package WELSGLOBAL\eBooks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WELSGLOBAL_EBOOKS_VERSION', '0.1.0' );
define( 'WELSGLOBAL_EBOOKS_FILE', __FILE__ );
define( 'WELSGLOBAL_EBOOKS_PATH', plugin_dir_path( __FILE__ ) );
define( 'WELSGLOBAL_EBOOKS_URL', plugin_dir_url( __FILE__ ) );

require_once WELSGLOBAL_EBOOKS_PATH . 'includes/class-plugin.php';

WELSGLOBAL_EBooks\Plugin::instance();
