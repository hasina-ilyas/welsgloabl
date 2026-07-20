<?php
/**
 * Manual cryptocurrency WooCommerce gateway.
 *
 * @package WELSGLOBAL\eBooks
 */

namespace WELSGLOBAL_EBooks;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Accepts a transaction hash for later administrator verification.
 */
final class Crypto_Gateway extends \WC_Payment_Gateway {

	/**
	 * Supported currencies and network configuration.
	 *
	 * @var array
	 */
	private $currencies = array();

	/**
	 * Set up the gateway.
	 */
	public function __construct() {
		$this->id                 = 'welsglobal_crypto';
		$this->method_title       = __( 'WELSGLOBAL Cryptocurrency', 'welsglobal-ebooks' );
		$this->method_description = __( 'Accept USDT, Bitcoin, or Ethereum transfers for manual administrator verification.', 'welsglobal-ebooks' );
		$this->has_fields         = true;
		$this->supports           = array( 'products' );

		$this->init_form_fields();
		$this->init_settings();

		$this->title       = $this->get_option( 'title' );
		$this->description = $this->get_option( 'description' );
		$this->enabled     = $this->get_option( 'enabled' );

		$this->currencies = array(
			'USDT' => array(
				'label'   => 'USDT',
				'network' => $this->get_option( 'usdt_network', 'TRC20' ),
				'wallet'  => trim( (string) $this->get_option( 'usdt_wallet' ) ),
			),
			'BTC'  => array(
				'label'   => 'Bitcoin (BTC)',
				'network' => $this->get_option( 'btc_network', 'Bitcoin' ),
				'wallet'  => trim( (string) $this->get_option( 'btc_wallet' ) ),
			),
			'ETH'  => array(
				'label'   => 'Ethereum (ETH)',
				'network' => $this->get_option( 'eth_network', 'ERC20' ),
				'wallet'  => trim( (string) $this->get_option( 'eth_wallet' ) ),
			),
		);

		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
	}

	/**
	 * Define settings fields.
	 *
	 * @return void
	 */
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled'      => array(
				'title'   => __( 'Enable/Disable', 'welsglobal-ebooks' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable cryptocurrency payments', 'welsglobal-ebooks' ),
				'default' => 'no',
			),
			'title'        => array(
				'title'       => __( 'Title', 'welsglobal-ebooks' ),
				'type'        => 'text',
				'default'     => __( 'Cryptocurrency', 'welsglobal-ebooks' ),
				'desc_tip'    => true,
				'description' => __( 'Shown to customers during checkout.', 'welsglobal-ebooks' ),
			),
			'description'  => array(
				'title'   => __( 'Description', 'welsglobal-ebooks' ),
				'type'    => 'textarea',
				'default' => __( 'Transfer using USDT, Bitcoin, or Ethereum and submit the transaction hash for verification.', 'welsglobal-ebooks' ),
			),
			'usdt_wallet'  => array(
				'title' => __( 'USDT wallet', 'welsglobal-ebooks' ),
				'type'  => 'text',
			),
			'usdt_network' => array(
				'title'   => __( 'USDT network', 'welsglobal-ebooks' ),
				'type'    => 'text',
				'default' => 'TRC20',
			),
			'btc_wallet'   => array(
				'title' => __( 'Bitcoin wallet', 'welsglobal-ebooks' ),
				'type'  => 'text',
			),
			'btc_network'  => array(
				'title'   => __( 'Bitcoin network', 'welsglobal-ebooks' ),
				'type'    => 'text',
				'default' => 'Bitcoin',
			),
			'eth_wallet'   => array(
				'title' => __( 'Ethereum wallet', 'welsglobal-ebooks' ),
				'type'  => 'text',
			),
			'eth_network'  => array(
				'title'   => __( 'Ethereum network', 'welsglobal-ebooks' ),
				'type'    => 'text',
				'default' => 'ERC20',
			),
		);
	}

	/**
	 * Only expose the gateway when at least one real wallet is configured.
	 *
	 * @return bool
	 */
	public function is_available() {
		if ( ! parent::is_available() ) {
			return false;
		}

		foreach ( $this->currencies as $currency ) {
			if ( '' !== $currency['wallet'] ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Render secure checkout inputs.
	 *
	 * @return void
	 */
	public function payment_fields() {
		if ( $this->description ) {
			echo wp_kses_post( wpautop( $this->description ) );
		}
		?>
		<p class="form-row form-row-wide">
			<label for="welsglobal_crypto_currency">
				<?php esc_html_e( 'Cryptocurrency', 'welsglobal-ebooks' ); ?>
				<span class="required">*</span>
			</label>
			<select id="welsglobal_crypto_currency" name="welsglobal_crypto_currency" required>
				<option value=""><?php esc_html_e( 'Select a currency', 'welsglobal-ebooks' ); ?></option>
				<?php foreach ( $this->currencies as $code => $currency ) : ?>
					<?php if ( '' !== $currency['wallet'] ) : ?>
						<option value="<?php echo esc_attr( $code ); ?>">
							<?php echo esc_html( $currency['label'] . ' — ' . $currency['network'] ); ?>
						</option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</p>
		<?php foreach ( $this->currencies as $code => $currency ) : ?>
			<?php if ( '' !== $currency['wallet'] ) : ?>
				<div class="welsglobal-crypto-wallet" data-crypto-wallet="<?php echo esc_attr( $code ); ?>" hidden>
					<strong><?php echo esc_html( $currency['network'] ); ?></strong>
					<code><?php echo esc_html( $currency['wallet'] ); ?></code>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
		<p class="form-row form-row-wide">
			<label for="welsglobal_crypto_hash">
				<?php esc_html_e( 'Transaction hash / transaction ID', 'welsglobal-ebooks' ); ?>
				<span class="required">*</span>
			</label>
			<input id="welsglobal_crypto_hash" name="welsglobal_crypto_hash" type="text" maxlength="180" required>
		</p>
		<?php
	}

	/**
	 * Validate submitted checkout fields.
	 *
	 * @return bool
	 */
	public function validate_fields() {
		$currency = isset( $_POST['welsglobal_crypto_currency'] ) ? sanitize_key( wp_unslash( $_POST['welsglobal_crypto_currency'] ) ) : '';
		$hash     = isset( $_POST['welsglobal_crypto_hash'] ) ? sanitize_text_field( wp_unslash( $_POST['welsglobal_crypto_hash'] ) ) : '';

		if ( ! isset( $this->currencies[ $currency ] ) || '' === $this->currencies[ $currency ]['wallet'] ) {
			wc_add_notice( __( 'Select an available cryptocurrency.', 'welsglobal-ebooks' ), 'error' );
			return false;
		}

		if ( strlen( $hash ) < 8 || strlen( $hash ) > 180 || ! preg_match( '/^[a-zA-Z0-9:_-]+$/', $hash ) ) {
			wc_add_notice( __( 'Enter a valid transaction hash or transaction ID.', 'welsglobal-ebooks' ), 'error' );
			return false;
		}

		$duplicate_orders = wc_get_orders(
			array(
				'limit'      => 1,
				'meta_key'   => '_welsglobal_crypto_hash',
				'meta_value' => $hash,
				'return'     => 'ids',
			)
		);

		if ( ! empty( $duplicate_orders ) ) {
			wc_add_notice( __( 'This transaction hash has already been submitted.', 'welsglobal-ebooks' ), 'error' );
			return false;
		}

		return true;
	}

	/**
	 * Store the transaction for manual verification.
	 *
	 * @param int $order_id WooCommerce order ID.
	 * @return array
	 */
	public function process_payment( $order_id ) {
		$order    = wc_get_order( $order_id );
		$currency = sanitize_key( wp_unslash( $_POST['welsglobal_crypto_currency'] ?? '' ) );
		$hash     = sanitize_text_field( wp_unslash( $_POST['welsglobal_crypto_hash'] ?? '' ) );
		$config   = $this->currencies[ $currency ];

		$order->update_meta_data( '_welsglobal_crypto_currency', strtoupper( $currency ) );
		$order->update_meta_data( '_welsglobal_crypto_network', $config['network'] );
		$order->update_meta_data( '_welsglobal_crypto_hash', $hash );
		$order->update_meta_data( '_welsglobal_crypto_submitted_at', current_time( 'mysql', true ) );
		$order->update_status( 'on-hold', __( 'Cryptocurrency transaction submitted for administrator verification.', 'welsglobal-ebooks' ) );
		$order->save();

		if ( WC()->cart ) {
			WC()->cart->empty_cart();
		}

		return array(
			'result'   => 'success',
			'redirect' => $this->get_return_url( $order ),
		);
	}
}
