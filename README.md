# WELSGLOBAL eBooks

Custom WordPress and WooCommerce implementation for the WELSGLOBAL Executive Strategy Series.

## Current architecture

- WordPress custom theme: `wp-content/themes/welsglobal`
- Custom commerce workflow plugin: `wp-content/plugins/welsglobal-ebooks`
- Commerce engine: WooCommerce
- Frontend styling: Tailwind CSS v4
- Product type: virtual, downloadable WooCommerce products
- Payment workflows:
  - WELSGLOBAL manual cryptocurrency gateway with administrator verification
  - CCAvenue hosted-payment WooCommerce gateway implemented; merchant credentials and the approved regional integration kit are required for sandbox/live verification
- Secure delivery: WooCommerce forced downloads and downloadable-product permissions

## Implemented customer journey

1. Browse the responsive eBook collection.
2. Open an eBook detail page.
3. Select a quantity and add the real WooCommerce product to the cart.
4. Review server-side cart quantities and totals.
5. Complete the WooCommerce checkout.
6. Select an available payment gateway.
7. Receive WooCommerce order and payment emails.
8. Receive protected download permissions after payment confirmation when files are configured.

## Local URLs

- Store: `http://localhost/welsglobal/ebooks/`
- Product example: `http://localhost/welsglobal/ebook-details/?ebook=02`
- Cart: `http://localhost/welsglobal/cart/`
- Checkout: `http://localhost/welsglobal/checkout/`
- WordPress administration: `http://localhost/welsglobal/wp-admin/`

## Products

| SKU | Product | Price |
| --- | --- | ---: |
| `WG-EBOOK-01` | Content Marketing Plan & Strategies | $15 |
| `WG-EBOOK-02` | The Beginner’s Guide to Digital Marketing Strategies | $40 |
| `WG-EBOOK-03` | Social Media Marketing Strategy | $25 |

All products are virtual/downloadable and assigned to the Digital Marketing category.

## Development

Requirements:

- PHP 8.1+
- WordPress 6.5+
- Node.js and npm
- MySQL/MariaDB
- Apache or another WordPress-compatible web server

Build the theme:

```powershell
cd wp-content\themes\welsglobal
npm install
npm run build
```

Watch Tailwind during development:

```powershell
npm run dev
```

The source stylesheet is `assets/src/app.css`; the production stylesheet is generated at `assets/dist/app.css`.

## Security notes

- Card numbers are not collected or stored by the custom theme/plugin.
- CC Avenue must use its hosted or approved iframe checkout.
- Crypto transaction hashes are sanitized, validated, checked for duplicates, and stored in WooCommerce order metadata.
- Crypto payments remain on hold until an authorized administrator verifies them.
- Download delivery uses WooCommerce permissions and forced streaming.
- Real wallet addresses, keys, credentials, and downloadable files must never be committed to Git.

## External configuration still required

- Approved local WELSGLOBAL logo and final brand assets
- Final eBook PDFs and cover assets
- Cryptocurrency wallet addresses and network confirmation
- Approved cryptocurrency conversion/pricing source
- CC Avenue Merchant ID, Access Code, Working Key, region, sandbox endpoint, and integration kit
- SMTP or transactional email credentials
- Production hosting/domain access

See [INSTALLATION.md](INSTALLATION.md), [QA-CHECKLIST.md](QA-CHECKLIST.md), and [WALKTHROUGH.md](WALKTHROUGH.md).
