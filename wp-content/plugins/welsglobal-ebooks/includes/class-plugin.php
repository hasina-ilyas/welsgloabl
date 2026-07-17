<?php
/**
 * Main plugin controller.
 *
 * @package WELSGLOBAL\eBooks
 */

namespace WELSGLOBAL_EBooks;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Boots the custom eBook functionality.
 */
final class Plugin {

	/**
	 * Plugin instance.
	 *
	 * @var self|null
	 */
	private static $instance = null;

	/**
	 * Get the plugin instance.
	 *
	 * @return self
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Register WordPress hooks.
	 */
	private function __construct() {
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		add_action( 'admin_notices', array( $this, 'maybe_show_woocommerce_notice' ) );
	}

	/**
	 * Load translated strings.
	 *
	 * @return void
	 */
	public function load_textdomain() {
		load_plugin_textdomain(
			'welsglobal-ebooks',
			false,
			dirname( plugin_basename( WELSGLOBAL_EBOOKS_FILE ) ) . '/languages'
		);
	}

	/**
	 * Explain that WooCommerce is required before commerce modules can run.
	 *
	 * @return void
	 */
	public function maybe_show_woocommerce_notice() {
		if ( class_exists( 'WooCommerce' ) || ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		?>
		<div class="notice notice-warning">
			<p>
				<?php esc_html_e( 'WELSGLOBAL eBooks requires WooCommerce for products, orders, and downloadable permissions.', 'welsglobal-ebooks' ); ?>
			</p>
		</div>
		<?php
	}
}
