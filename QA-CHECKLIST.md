# Quality Assurance Checklist

## Brand and UI

- [ ] Approved local logo appears correctly on dark and light backgrounds.
- [ ] Official colors and fonts are confirmed.
- [ ] Landing, detail, cart, checkout, emails, and thank-you states are consistent.
- [ ] Buttons include hover, focus, disabled, loading, success, and error states.
- [ ] No temporary offers, wallet addresses, or placeholder assets remain.

## Responsive behavior

- [ ] 320 px mobile viewport
- [ ] 390 px mobile viewport
- [ ] 768 px tablet viewport
- [ ] 1024 px small desktop viewport
- [ ] 1440 px desktop viewport
- [ ] No unintended horizontal scrolling
- [ ] Touch targets are at least approximately 44 px

## Accessibility

- [ ] Keyboard-only navigation
- [ ] Visible focus states
- [ ] Logical heading hierarchy
- [ ] Form labels and useful error messages
- [ ] Screen-reader names for icon buttons
- [ ] Color contrast review
- [ ] Reduced-motion behavior where appropriate

## Product and cart

- [x] Real WooCommerce products exist with expected SKUs/prices.
- [x] Product detail quantity adds to the WooCommerce cart.
- [x] Cart quantities and totals are server calculated.
- [x] Cart persists through the WooCommerce session.
- [ ] Invalid/out-of-range quantities are rejected safely.
- [ ] Guest and logged-in customer journeys pass.

## Cryptocurrency

- [x] Gateway stays unavailable without configured wallets.
- [x] Currency/hash inputs are sanitized and validated.
- [x] Duplicate hash submissions are rejected.
- [x] Orders remain on hold before verification.
- [x] Verification/rejection actions require order-management permission.
- [ ] Exact crypto amount conversion is tested against the approved rate source.
- [ ] Wallet, network, QR code, amount, and confirmations are tested.
- [ ] Wrong network, underpayment, overpayment, and delayed-payment procedures are documented.

## CC Avenue

- [ ] Sandbox success
- [ ] Sandbox failure
- [ ] Customer cancellation
- [ ] Invalid encrypted response/signature
- [ ] Duplicate callback
- [ ] Callback replay
- [ ] Amount/order/currency mismatch
- [ ] Timeout/retry
- [ ] Production low-value transaction

## Download delivery

- [x] WooCommerce forced-download mode enabled.
- [x] Access is tied to paid-order download permissions.
- [x] Download logs are available.
- [ ] Final files configured.
- [ ] Direct URL cannot bypass authorization.
- [ ] Download limits and expiry pass.
- [ ] Expired/invalid-link messaging passes.

## Email

- [x] WooCommerce email branding filters load.
- [x] Crypto on-hold subject is customized.
- [ ] SMTP delivery passes.
- [ ] Customer receipt and download email pass.
- [ ] Admin new/failed order email passes.
- [ ] Major email-client rendering checked.

## Code and operations

- [x] New custom PHP files pass `php -l`.
- [x] Frontend JavaScript passes `node --check`.
- [x] Tailwind production build passes.
- [ ] WordPress coding standards run.
- [ ] Error logs are clean during all flows.
- [ ] Backup and restore drill completed.
- [ ] Secrets excluded from source control.
