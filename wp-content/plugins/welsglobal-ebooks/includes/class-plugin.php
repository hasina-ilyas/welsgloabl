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
		add_action( 'wp_ajax_welsglobal_create_checkout_order', array( $this, 'create_checkout_order' ) );
		add_action( 'wp_ajax_nopriv_welsglobal_create_checkout_order', array( $this, 'create_checkout_order' ) );

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
	 * Create a server-priced WooCommerce order from the custom checkout and
	 * return the hosted gateway handoff URL.
	 *
	 * @return void
	 */
	public function create_checkout_order() {
		check_ajax_referer( 'welsglobal_custom_checkout', 'nonce' );

		$payment_method = isset( $_POST['payment_method'] ) ? sanitize_key( wp_unslash( $_POST['payment_method'] ) ) : '';
		if ( 'card' !== $payment_method ) {
			wp_send_json_error( array( 'message' => __( 'Select Credit / Debit Card to continue to CCAvenue.', 'welsglobal-ebooks' ) ), 400 );
		}

		$gateway = new CCAvenue_Gateway();
		if ( ! $gateway->is_available() ) {
			wp_send_json_error(
				array(
					'message' => __( 'CCAvenue is not ready. Enable it and enter the Merchant ID, Access Code, and Working Key in WooCommerce payment settings.', 'welsglobal-ebooks' ),
				),
				503
			);
		}

		$first_name = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
		$last_name  = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
		$email      = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
		$country    = isset( $_POST['country'] ) ? strtoupper( sanitize_key( wp_unslash( $_POST['country'] ) ) ) : '';
		$phone      = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
		$terms      = isset( $_POST['terms'] ) && '1' === sanitize_text_field( wp_unslash( $_POST['terms'] ) );

		if ( '' === $first_name || '' === $last_name || ! is_email( $email ) || ! $terms ) {
			wp_send_json_error( array( 'message' => __( 'Complete the required customer fields and accept the terms before continuing.', 'welsglobal-ebooks' ) ), 400 );
		}

		$allowed_countries = WC()->countries->get_countries();
		if ( ! isset( $allowed_countries[ $country ] ) ) {
			wp_send_json_error( array( 'message' => __( 'Select a valid billing country.', 'welsglobal-ebooks' ) ), 400 );
		}

		$raw_items = isset( $_POST['items'] ) ? json_decode( wp_unslash( $_POST['items'] ), true ) : null;
		if ( ! is_array( $raw_items ) || empty( $raw_items ) || count( $raw_items ) > 10 ) {
			wp_send_json_error( array( 'message' => __( 'Your cart is empty or invalid.', 'welsglobal-ebooks' ) ), 400 );
		}

		try {
			$order = wc_create_order();

			foreach ( $raw_items as $item ) {
				$ebook_id = isset( $item['id'] ) ? sanitize_key( $item['id'] ) : '';
				$quantity = isset( $item['quantity'] ) ? absint( $item['quantity'] ) : 0;

				if ( ! in_array( $ebook_id, array( '01', '02', '03' ), true ) || $quantity < 1 || $quantity > 10 ) {
					throw new \Exception( __( 'One of the cart items is invalid.', 'welsglobal-ebooks' ) );
				}

				$product_id = wc_get_product_id_by_sku( 'WG-EBOOK-' . $ebook_id );
				$product    = $product_id ? wc_get_product( $product_id ) : false;
				if ( ! $product || ! $product->is_purchasable() ) {
					throw new \Exception( __( 'One of the selected eBooks is currently unavailable.', 'welsglobal-ebooks' ) );
				}

				$order->add_product( $product, $quantity );
			}

			$order->set_address(
				array(
					'first_name' => $first_name,
					'last_name'  => $last_name,
					'email'      => $email,
					'phone'      => $phone,
					'country'    => $country,
				),
				'billing'
			);
			$order->set_payment_method( $gateway );
			$order->set_created_via( 'welsglobal-custom-checkout' );
			$order->calculate_totals();
			$order->save();

			$result = $gateway->process_payment( $order->get_id() );
			if ( empty( $result['redirect'] ) || 'success' !== ( $result['result'] ?? '' ) ) {
				throw new \Exception( __( 'CCAvenue could not prepare the payment redirect.', 'welsglobal-ebooks' ) );
			}

			wp_send_json_success(
				array(
					'orderId'  => $order->get_id(),
					'orderKey' => $order->get_order_key(),
					'redirect' => esc_url_raw( $result['redirect'] ),
				)
			);
		} catch ( \Throwable $error ) {
			if ( isset( $order ) && $order instanceof \WC_Order ) {
				$order->delete( true );
			}

			wc_get_logger()->error( $error->getMessage(), array( 'source' => 'welsglobal-custom-checkout' ) );
			wp_send_json_error( array( 'message' => $error->getMessage() ), 500 );
		}
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
