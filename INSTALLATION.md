# Installation and Configuration

## 1. WordPress

1. Deploy the WordPress files and import the database.
2. Set the production database constants in `wp-config.php`.
3. Set production `WP_HOME` and `WP_SITEURL` values if required.
4. Use HTTPS in staging and production.
5. Confirm pretty permalinks are enabled.

## 2. Theme

1. Activate **WELSGLOBAL** under Appearance → Themes.
2. From `wp-content/themes/welsglobal`, run `npm install`.
3. Run `npm run build`.
4. Confirm `assets/dist/app.css` loads on the storefront.
5. Replace the remote logo reference with the approved local logo asset before production deployment.

## 3. Plugins

Activate:

1. WooCommerce
2. WELSGLOBAL eBooks

Confirm WooCommerce maps the following pages:

- Cart → `/cart/`
- Checkout → `/checkout/`
- My account → `/my-account/`

Set the store currency to USD unless the final commercial requirements specify otherwise.

## 4. Products

The expected SKUs are:

- `WG-EBOOK-01`
- `WG-EBOOK-02`
- `WG-EBOOK-03`

For each product:

1. Keep **Virtual** enabled.
2. Keep **Downloadable** enabled.
3. Upload the approved final PDF through the WooCommerce downloadable-files interface.
4. Set an appropriate download limit.
5. Set an expiry period based on the approved customer policy.
6. Do not paste a publicly browsable media-library URL into customer-facing content.

WooCommerce download settings:

- File download method: Force downloads
- Grant access after payment: Enabled
- Require login: Optional; guest checkout currently remains supported

## 5. Cryptocurrency

Go to WooCommerce → Settings → Payments → WELSGLOBAL Cryptocurrency.

1. Enter only approved production/sandbox wallet addresses.
2. Confirm the network for each wallet.
3. Enable only currencies with configured wallets.
4. Leave the gateway disabled until wallet ownership and the complete verification workflow are tested.

Administrator verification:

1. Open an on-hold crypto order.
2. Review currency, network, and transaction hash.
3. Verify the transfer independently on the correct blockchain.
4. Use **Verify crypto payment** only after confirming amount, asset, network, recipient, and confirmations.
5. Use **Reject crypto payment** when the evidence is invalid.

Verification marks the WooCommerce payment complete, records the administrator/time, triggers applicable emails, and grants downloadable permissions.

## 6. CC Avenue

Required inputs:

- Merchant ID
- Access Code
- Working Key
- UAE/regional account confirmation
- Sandbox and production endpoints
- Approved WooCommerce integration kit/version
- Callback/redirect requirements

Do not enable CC Avenue until:

1. The merchant-supplied integration kit is reviewed.
2. Response signatures/encryption are validated against sandbox fixtures.
3. Successful, failed, cancelled, replayed, and duplicated callbacks are tested.
4. HTTPS callback URLs are registered with CC Avenue.

The custom gateway is available at **WooCommerce → Settings → Payments → CCAvenue**. Configure:

- Merchant ID
- Access Code
- Working Key / Encryption Key
- Sandbox and live transaction endpoints from the merchant's regional integration kit
- Test mode while validating the account

The callback URL is generated automatically through WooCommerce's `wc-api` endpoint. No secret key is exposed in browser markup; only the encrypted request and Access Code are posted to the hosted CCAvenue page.
5. The merchant confirms supported currency and payment methods.

Card numbers, CVV values, OTPs, or other sensitive payment data must never be logged or stored by WordPress.

## 7. Email

1. Configure an authenticated SMTP or transactional provider.
2. Set the WooCommerce sender name and address.
3. Test new order, on-hold, processing, completed, failed, and download emails.
4. Verify rendering in major desktop and mobile email clients.
5. Confirm administrator recipients.

## 8. Production

Before launch:

1. Enable HTTPS and secure cookies.
2. Disable WordPress debug display.
3. Configure protected backups.
4. Configure server-level caching without caching cart, checkout, account, or callback endpoints.
5. Run the complete `QA-CHECKLIST.md`.
6. Perform a real low-value transaction for each production gateway.
