<?php
/**
 * Cryptocurrency order administration.
 *
 * @package WELSGLOBAL\eBooks
 */

namespace WELSGLOBAL_EBooks;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds protected administrator verification controls.
 */
final class Order_Admin {

	/**
	 * Singleton instance.
	 *
	 * @var self|null
	 */
	private static $instance = null;

	/**
	 * Get the module instance.
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
	 * Register hooks.
	 */
	private function __construct() {
		add_filter( 'woocommerce_order_actions', array( $this, 'add_order_actions' ), 20, 2 );
		add_action( 'woocommerce_order_action_welsglobal_verify_crypto', array( $this, 'verify_crypto_payment' ) );
		add_action( 'woocommerce_order_action_welsglobal_reject_crypto', array( $this, 'reject_crypto_payment' ) );
		add_action( 'woocommerce_admin_order_data_after_billing_address', array( $this, 'render_transaction_details' ) );
	}

	/**
	 * Add verification actions only to crypto orders.
	 *
	 * @param array     $actions Available actions.
	 * @param \WC_Order $order Order instance.
	 * @return array
	 */
	public function add_order_actions( $actions, $order ) {
		if ( 'welsglobal_crypto' !== $order->get_payment_method() ) {
			return $actions;
		}

		if ( ! $order->is_paid() ) {
			$actions['welsglobal_verify_crypto'] = __( 'Verify crypto payment', 'welsglobal-ebooks' );
			$actions['welsglobal_reject_crypto'] = __( 'Reject crypto payment', 'welsglobal-ebooks' );
		}

		return $actions;
	}

	/**
	 * Mark a reviewed transaction as paid.
	 *
	 * @param \WC_Order $order Order instance.
	 * @return void
	 */
	public function verify_crypto_payment( $order ) {
		if ( 'welsglobal_crypto' !== $order->get_payment_method() || $order->is_paid() ) {
			return;
		}

		$order->update_meta_data( '_welsglobal_crypto_verified_by', get_current_user_id() );
		$order->update_meta_data( '_welsglobal_crypto_verified_at', current_time( 'mysql', true ) );
		$order->payment_complete( $order->get_meta( '_welsglobal_crypto_hash' ) );
		$order->add_order_note( __( 'Cryptocurrency payment verified by an administrator.', 'welsglobal-ebooks' ) );
		$order->save();
	}

	/**
	 * Reject a submitted transaction.
	 *
	 * @param \WC_Order $order Order instance.
	 * @return void
	 */
	public function reject_crypto_payment( $order ) {
		if ( 'welsglobal_crypto' !== $order->get_payment_method() || $order->is_paid() ) {
			return;
		}

		$order->update_meta_data( '_welsglobal_crypto_rejected_by', get_current_user_id() );
		$order->update_meta_data( '_welsglobal_crypto_rejected_at', current_time( 'mysql', true ) );
		$order->update_status( 'failed', __( 'Cryptocurrency transaction rejected by an administrator.', 'welsglobal-ebooks' ) );
		$order->save();
	}

	/**
	 * Show transaction metadata in the order screen.
	 *
	 * @param \WC_Order $order Order instance.
	 * @return void
	 */
	public function render_transaction_details( $order ) {
		if ( 'welsglobal_crypto' !== $order->get_payment_method() ) {
			return;
		}

		echo '<div class="welsglobal-crypto-order">';
		echo '<h3>' . esc_html__( 'Cryptocurrency transaction', 'welsglobal-ebooks' ) . '</h3>';
		echo '<p><strong>' . esc_html__( 'Currency:', 'welsglobal-ebooks' ) . '</strong> ' . esc_html( $order->get_meta( '_welsglobal_crypto_currency' ) ) . '</p>';
		echo '<p><strong>' . esc_html__( 'Network:', 'welsglobal-ebooks' ) . '</strong> ' . esc_html( $order->get_meta( '_welsglobal_crypto_network' ) ) . '</p>';
		echo '<p><strong>' . esc_html__( 'Transaction hash:', 'welsglobal-ebooks' ) . '</strong><br><code>' . esc_html( $order->get_meta( '_welsglobal_crypto_hash' ) ) . '</code></p>';
		echo '</div>';
	}
}
