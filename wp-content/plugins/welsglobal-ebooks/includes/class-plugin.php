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
		add_action( 'plugins_loaded', array( $this, 'boot_woocommerce_modules' ), 20 );
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
	 * Boot modules that depend on WooCommerce.
	 *
	 * @return void
	 */
	public function boot_woocommerce_modules() {
		if ( ! class_exists( 'WooCommerce' ) || ! class_exists( 'WC_Payment_Gateway' ) ) {
			return;
		}

		require_once WELSGLOBAL_EBOOKS_PATH . 'includes/class-crypto-gateway.php';
		require_once WELSGLOBAL_EBOOKS_PATH . 'includes/class-ccavenue-gateway.php';
		require_once WELSGLOBAL_EBOOKS_PATH . 'includes/class-order-admin.php';
		require_once WELSGLOBAL_EBOOKS_PATH . 'includes/class-email-branding.php';

		add_filter( 'woocommerce_payment_gateways', array( $this, 'register_payment_gateways' ) );

		Order_Admin::instance();
		Email_Branding::instance();
	}

	/**
	 * Register the custom payment gateways.
	 *
	 * @param array $gateways Payment gateway classes.
	 * @return array
	 */
	public function register_payment_gateways( $gateways ) {
		$gateways[] = Crypto_Gateway::class;
		$gateways[] = CCAvenue_Gateway::class;

		return $gateways;
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
