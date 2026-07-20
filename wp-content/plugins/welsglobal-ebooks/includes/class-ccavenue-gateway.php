<?php
/**
 * CCAvenue hosted-payment WooCommerce gateway.
 *
 * @package WELSGLOBAL\eBooks
 */

namespace WELSGLOBAL_EBooks;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Redirects customers to CCAvenue and validates its encrypted response.
 */
final class CCAvenue_Gateway extends \WC_Payment_Gateway {

	/**
	 * Set up the gateway and its hooks.
	 */
	public function __construct() {
		$this->id                 = 'welsglobal_ccavenue';
		$this->method_title       = __( 'CCAvenue', 'welsglobal-ebooks' );
		$this->method_description = __( 'Accept payments on CCAvenue’s secure hosted checkout.', 'welsglobal-ebooks' );
		$this->has_fields         = false;
		$this->supports           = array( 'products' );

		$this->init_form_fields();
		$this->init_settings();

		$this->title       = $this->get_option( 'title', 'CCAvenue' );
		$this->description = $this->get_option( 'description' );
		$this->enabled     = $this->get_option( 'enabled', 'no' );

		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_receipt_' . $this->id, array( $this, 'receipt_page' ) );
		add_action( 'woocommerce_api_wc_gateway_welsglobal_ccavenue_start', array( $this, 'start_payment' ) );
		add_action( 'woocommerce_api_wc_gateway_welsglobal_ccavenue', array( $this, 'handle_response' ) );
	}

	/**
	 * Define administrator settings.
	 *
	 * @return void
	 */
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled'      => array(
				'title'   => __( 'Enable/Disable', 'welsglobal-ebooks' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable CCAvenue payments', 'welsglobal-ebooks' ),
				'default' => 'no',
			),
			'title'        => array(
				'title'       => __( 'Checkout title', 'welsglobal-ebooks' ),
				'type'        => 'text',
				'default'     => __( 'Credit / Debit Card (CCAvenue)', 'welsglobal-ebooks' ),
				'description' => __( 'Shown to customers at checkout.', 'welsglobal-ebooks' ),
				'desc_tip'    => true,
			),
			'description'  => array(
				'title'   => __( 'Description', 'welsglobal-ebooks' ),
				'type'    => 'textarea',
				'default' => __( 'Pay securely through CCAvenue. Your card details are entered only on CCAvenue’s hosted payment page.', 'welsglobal-ebooks' ),
			),
			'test_mode'    => array(
				'title'   => __( 'Test mode', 'welsglobal-ebooks' ),
				'type'    => 'checkbox',
				'label'   => __( 'Use the configured sandbox endpoint', 'welsglobal-ebooks' ),
				'default' => 'yes',
			),
			'merchant_id'  => array(
				'title'       => __( 'Merchant ID', 'welsglobal-ebooks' ),
				'type'        => 'text',
				'description' => __( 'Issued in the CCAvenue merchant dashboard.', 'welsglobal-ebooks' ),
			),
			'access_code'  => array(
				'title' => __( 'Access Code', 'welsglobal-ebooks' ),
				'type'  => 'password',
			),
			'working_key'  => array(
				'title'       => __( 'Working Key / Encryption Key', 'welsglobal-ebooks' ),
				'type'        => 'password',
				'description' => __( 'Keep this secret. It is used server-side to encrypt requests and decrypt responses.', 'welsglobal-ebooks' ),
			),
			'live_endpoint' => array(
				'title'   => __( 'Live transaction endpoint', 'welsglobal-ebooks' ),
				'type'    => 'url',
				'default' => 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction',
			),
			'test_endpoint' => array(
				'title'       => __( 'Sandbox transaction endpoint', 'welsglobal-ebooks' ),
				'type'        => 'url',
				'default'     => 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction',
				'description' => __( 'Confirm the correct regional endpoint against your merchant integration kit.', 'welsglobal-ebooks' ),
			),
		);
	}

	/**
	 * Do not expose an unconfigured gateway.
	 *
	 * @return bool
	 */
	public function is_available() {
		return parent::is_available()
			&& '' !== trim( (string) $this->get_option( 'merchant_id' ) )
			&& '' !== trim( (string) $this->get_option( 'access_code' ) )
			&& '' !== trim( (string) $this->get_option( 'working_key' ) );
	}

	/**
	 * Send WooCommerce to its order-pay receipt page.
	 *
	 * @param int $order_id WooCommerce order ID.
	 * @return array
	 */
	public function process_payment( $order_id ) {
		$order = wc_get_order( $order_id );

		if ( ! $order ) {
			wc_add_notice( __( 'The order could not be prepared for CCAvenue.', 'welsglobal-ebooks' ), 'error' );
			return array( 'result' => 'failure' );
		}

		$order->update_status( 'pending', __( 'Awaiting CCAvenue payment.', 'welsglobal-ebooks' ) );

		return array(
			'result'   => 'success',
			'redirect' => add_query_arg(
				array(
					'wc-api'   => 'WC_Gateway_Welsglobal_CCAvenue_Start',
					'order_id' => $order->get_id(),
					'key'      => $order->get_order_key(),
				),
				home_url( '/' )
			),
		);
	}

	/**
	 * Render the protected CCAvenue handoff independently of the custom
	 * checkout page template.
	 *
	 * @return void
	 */
	public function start_payment() {
		$order_id = isset( $_GET['order_id'] ) ? absint( $_GET['order_id'] ) : 0;
		$order_key = isset( $_GET['key'] ) ? wc_clean( wp_unslash( $_GET['key'] ) ) : '';
		$order     = wc_get_order( $order_id );

		if ( ! $order || ! hash_equals( $order->get_order_key(), $order_key ) || $this->id !== $order->get_payment_method() ) {
			status_header( 403 );
			wp_die(
				esc_html__( 'This CCAvenue payment link is invalid or has expired.', 'welsglobal-ebooks' ),
				esc_html__( 'Payment link error', 'welsglobal-ebooks' ),
				array( 'response' => 403 )
			);
		}

		nocache_headers();
		?>
		<!doctype html>
		<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title><?php esc_html_e( 'Connecting to CCAvenue', 'welsglobal-ebooks' ); ?></title>
			<style>
				body{margin:0;background:#f4efe6;color:#17241f;font:16px/1.6 system-ui,sans-serif}
				main{display:grid;min-height:100vh;place-items:center;padding:24px}
				.welsglobal-ccavenue-redirect{max-width:560px;border:1px solid #d8dedb;border-radius:24px;background:#fff;padding:40px;text-align:center;box-shadow:0 18px 50px rgba(23,36,31,.12)}
				.button{display:inline-block;border:0;border-radius:999px;background:#d7b98a;color:#17241f;padding:14px 28px;font-weight:800;cursor:pointer}
			</style>
		</head>
		<body>
			<main><?php $this->receipt_page( $order_id ); ?></main>
		</body>
		</html>
		<?php
		exit;
	}

	/**
	 * Render a short auto-submitting form to the hosted gateway.
	 *
	 * @param int $order_id WooCommerce order ID.
	 * @return void
	 */
	public function receipt_page( $order_id ) {
		$order = wc_get_order( $order_id );

		if ( ! $order || $this->id !== $order->get_payment_method() ) {
			wc_print_notice( __( 'This CCAvenue payment request is invalid.', 'welsglobal-ebooks' ), 'error' );
			return;
		}

		$callback_url = add_query_arg( 'wc-api', 'WC_Gateway_Welsglobal_CCAvenue', home_url( '/' ) );
		$billing_name = trim( $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() );
		$data         = array(
			'merchant_id'   => trim( (string) $this->get_option( 'merchant_id' ) ),
			'order_id'      => (string) $order->get_id(),
			'currency'      => $order->get_currency(),
			'amount'        => wc_format_decimal( $order->get_total(), wc_get_price_decimals() ),
			'redirect_url'  => $callback_url,
			'cancel_url'    => $callback_url,
			'language'      => 'EN',
			'billing_name'  => $billing_name,
			'billing_email' => $order->get_billing_email(),
			'billing_tel'   => $order->get_billing_phone(),
			'billing_address' => $order->get_billing_address_1(),
			'billing_city'    => $order->get_billing_city(),
			'billing_state'   => $order->get_billing_state(),
			'billing_zip'     => $order->get_billing_postcode(),
			'billing_country' => $order->get_billing_country(),
			'merchant_param1' => $order->get_order_key(),
		);

		$plain_request = http_build_query( array_filter( $data, static fn( $value ) => '' !== (string) $value ), '', '&', PHP_QUERY_RFC3986 );
		$encrypted     = $this->encrypt( $plain_request );

		if ( '' === $encrypted ) {
			wc_print_notice( __( 'CCAvenue encryption failed. Please contact the store administrator.', 'welsglobal-ebooks' ), 'error' );
			return;
		}

		$endpoint = 'yes' === $this->get_option( 'test_mode', 'yes' )
			? $this->get_option( 'test_endpoint' )
			: $this->get_option( 'live_endpoint' );
		?>
		<div class="welsglobal-ccavenue-redirect">
			<p><?php esc_html_e( 'You are being redirected to CCAvenue’s secure payment page…', 'welsglobal-ebooks' ); ?></p>
			<form id="welsglobal-ccavenue-form" method="post" action="<?php echo esc_url( $endpoint ); ?>">
				<input type="hidden" name="encRequest" value="<?php echo esc_attr( $encrypted ); ?>">
				<input type="hidden" name="access_code" value="<?php echo esc_attr( $this->get_option( 'access_code' ) ); ?>">
				<button class="button alt" type="submit"><?php esc_html_e( 'Continue to CCAvenue', 'welsglobal-ebooks' ); ?></button>
			</form>
			<script>window.setTimeout(function(){document.getElementById('welsglobal-ccavenue-form').submit();},500);</script>
		</div>
		<?php
	}

	/**
	 * Validate and apply CCAvenue's encrypted callback.
	 *
	 * @return void
	 */
	public function handle_response() {
		$encrypted_response = isset( $_POST['encResp'] ) ? sanitize_text_field( wp_unslash( $_POST['encResp'] ) ) : '';
		$plain_response     = $this->decrypt( $encrypted_response );
		$response           = array();

		if ( '' === $plain_response ) {
			$this->fail_callback( null, __( 'CCAvenue returned an invalid encrypted response.', 'welsglobal-ebooks' ) );
		}

		parse_str( $plain_response, $response );
		$order_id = isset( $response['order_id'] ) ? absint( $response['order_id'] ) : 0;
		$order    = wc_get_order( $order_id );

		if ( ! $order || $this->id !== $order->get_payment_method() ) {
			$this->fail_callback( null, __( 'CCAvenue returned an unknown order.', 'welsglobal-ebooks' ) );
		}

		$response_key = isset( $response['merchant_param1'] ) ? wc_clean( $response['merchant_param1'] ) : '';
		$amount       = isset( $response['amount'] ) ? wc_format_decimal( $response['amount'], wc_get_price_decimals() ) : '';
		$currency     = isset( $response['currency'] ) ? strtoupper( wc_clean( $response['currency'] ) ) : '';

		if ( ! hash_equals( $order->get_order_key(), $response_key )
			|| $amount !== wc_format_decimal( $order->get_total(), wc_get_price_decimals() )
			|| $currency !== strtoupper( $order->get_currency() ) ) {
			$this->fail_callback( $order, __( 'CCAvenue response verification failed because the order details did not match.', 'welsglobal-ebooks' ) );
		}

		$status      = isset( $response['order_status'] ) ? strtolower( wc_clean( $response['order_status'] ) ) : '';
		$tracking_id = isset( $response['tracking_id'] ) ? wc_clean( $response['tracking_id'] ) : '';
		$bank_ref    = isset( $response['bank_ref_no'] ) ? wc_clean( $response['bank_ref_no'] ) : '';

		$order->update_meta_data( '_welsglobal_ccavenue_tracking_id', $tracking_id );
		$order->update_meta_data( '_welsglobal_ccavenue_bank_ref', $bank_ref );
		$order->update_meta_data( '_welsglobal_ccavenue_status', $status );
		$order->save();

		if ( 'success' === $status ) {
			if ( ! $order->is_paid() ) {
				$order->payment_complete( $tracking_id );
				$order->add_order_note( __( 'CCAvenue payment verified successfully.', 'welsglobal-ebooks' ) );
			}

			if ( WC()->cart ) {
				WC()->cart->empty_cart();
			}

			wp_safe_redirect( $this->get_return_url( $order ) );
			exit;
		}

		if ( 'aborted' === $status ) {
			$order->update_status( 'cancelled', __( 'Customer aborted the CCAvenue payment.', 'welsglobal-ebooks' ) );
			wc_add_notice( __( 'CCAvenue payment was cancelled. You may try again.', 'welsglobal-ebooks' ), 'notice' );
		} else {
			$order->update_status( 'failed', __( 'CCAvenue reported a failed payment.', 'welsglobal-ebooks' ) );
			wc_add_notice( __( 'CCAvenue could not complete the payment. Please try again.', 'welsglobal-ebooks' ), 'error' );
		}

		wp_safe_redirect( $order->get_checkout_payment_url() );
		exit;
	}

	/**
	 * Stop an invalid callback and keep an audit note when possible.
	 *
	 * @param \WC_Order|null $order Order, when identified.
	 * @param string         $message Failure reason.
	 * @return never
	 */
	private function fail_callback( $order, $message ) {
		if ( $order instanceof \WC_Order ) {
			$order->add_order_note( $message );
		}

		wc_get_logger()->error( $message, array( 'source' => 'welsglobal-ccavenue' ) );
		status_header( 400 );
		wp_die( esc_html( $message ), esc_html__( 'CCAvenue response error', 'welsglobal-ebooks' ), array( 'response' => 400 ) );
	}

	/**
	 * Encrypt a CCAvenue request using the integration-kit AES scheme.
	 *
	 * @param string $plain_text Request string.
	 * @return string
	 */
	private function encrypt( $plain_text ) {
		$key       = pack( 'H*', md5( trim( (string) $this->get_option( 'working_key' ) ) ) );
		$iv        = pack( 'C*', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15 );
		$encrypted = openssl_encrypt( $plain_text, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv );

		return false === $encrypted ? '' : bin2hex( $encrypted );
	}

	/**
	 * Decrypt a CCAvenue response using the integration-kit AES scheme.
	 *
	 * @param string $encrypted_text Hex-encoded response.
	 * @return string
	 */
	private function decrypt( $encrypted_text ) {
		if ( '' === $encrypted_text || ! ctype_xdigit( $encrypted_text ) || 0 !== strlen( $encrypted_text ) % 2 ) {
			return '';
		}

		$key       = pack( 'H*', md5( trim( (string) $this->get_option( 'working_key' ) ) ) );
		$iv        = pack( 'C*', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15 );
		$decrypted = openssl_decrypt( hex2bin( $encrypted_text ), 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv );

		return false === $decrypted ? '' : $decrypted;
	}
}
