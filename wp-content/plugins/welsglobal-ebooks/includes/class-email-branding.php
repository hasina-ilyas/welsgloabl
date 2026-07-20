<?php
/**
 * WooCommerce customer and administrator email branding.
 *
 * @package WELSGLOBAL\eBooks
 */

namespace WELSGLOBAL_EBooks;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Keeps transactional emails consistent with the storefront.
 */
final class Email_Branding {

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
	 * Register filters.
	 */
	private function __construct() {
		add_filter( 'woocommerce_email_styles', array( $this, 'add_email_styles' ), 20 );
		add_filter( 'woocommerce_email_footer_text', array( $this, 'filter_footer_text' ) );
		add_filter( 'woocommerce_email_subject_customer_on_hold_order', array( $this, 'filter_crypto_pending_subject' ), 20, 2 );
	}

	/**
	 * Append conservative email-client-compatible styles.
	 *
	 * @param string $css Core WooCommerce email CSS.
	 * @return string
	 */
	public function add_email_styles( $css ) {
		$css .= '
			#wrapper { background-color: #f4efe6 !important; }
			#template_header { background-color: #17241f !important; }
			#template_header h1 { color: #ffffff !important; font-weight: 700 !important; }
			#body_content { border-radius: 18px !important; }
			#body_content_inner h1,
			#body_content_inner h2,
			#body_content_inner h3 { color: #17241f !important; }
			.button, a.button { background-color: #d7b98a !important; color: #17241f !important; border-radius: 999px !important; }
			#template_footer { color: #64748b !important; }
		';

		return $css;
	}

	/**
	 * Add a branded footer.
	 *
	 * @return string
	 */
	public function filter_footer_text() {
		return __( 'WELSGLOBAL LLC — Practical strategy for measurable, sustainable growth. Need help? Contact hello@welsglobal.com.', 'welsglobal-ebooks' );
	}

	/**
	 * Clarify that a crypto order is waiting for verification.
	 *
	 * @param string    $subject Default email subject.
	 * @param \WC_Order $order Order instance.
	 * @return string
	 */
	public function filter_crypto_pending_subject( $subject, $order ) {
		if ( $order instanceof \WC_Order && 'welsglobal_crypto' === $order->get_payment_method() ) {
			return sprintf(
				/* translators: %s: order number. */
				__( 'Your WELSGLOBAL crypto payment is being verified — order %s', 'welsglobal-ebooks' ),
				$order->get_order_number()
			);
		}

		return $subject;
	}
}
