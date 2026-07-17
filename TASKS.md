# WELSGLOBAL eBooks — Implementation Tracker

Last updated: 2026-07-17

## Status legend

- `[ ]` Not started
- `[~]` In progress
- `[x]` Completed
- `[!]` Blocked or requires credentials/content

## Progress

- Main tasks completed: **2 / 14**
- Current phase: **Storefront**
- Current task: **Task 5 — Build the custom eBooks page**

## Task 1 — Audit the existing WordPress project

- [x] Inspect the WordPress repository structure.
- [x] Inspect installed themes and plugins.
- [x] Check the Git working tree and development tools.
- [x] Confirm whether a custom WELSGLOBAL implementation already exists.
- [x] Record the audit findings.

### Audit findings

- The repository contains a fresh WordPress installation.
- Installed themes are Twenty Twenty-Three, Twenty Twenty-Four, and Twenty Twenty-Five.
- Installed plugins are Akismet and Hello Dolly only.
- WooCommerce is not installed.
- No custom WELSGLOBAL theme, eBook plugin, product data, or payment integration exists.
- Node.js and npm are available.
- PHP is included with XAMPP but is not currently available through the terminal `PATH`.
- The supplied technical assessment PDF is stored at the project root.

## Task 2 — Set up the custom architecture

- [x] Create the custom `welsglobal` theme.
- [x] Create the custom `welsglobal-ebooks` plugin.
- [x] Add the initial organized theme includes and template structure.
- [x] Add the extensible plugin bootstrap and main controller.
- [x] Add initial coding and security conventions.
- [x] Verify that all initial PHP files pass syntax checks.

## Task 3 — Configure Tailwind CSS

- [x] Add Tailwind CSS and build dependencies.
- [x] Configure template and PHP content scanning.
- [~] Add initial WELSGLOBAL colors, typography, spacing, shadows, and breakpoints; confirm against the official brand guide when supplied.
- [x] Create the source stylesheet.
- [x] Add development and production build scripts.
- [x] Build and enqueue the production stylesheet.

## Task 4 — Create the eBook data model

- [!] Install and activate WooCommerce.
- [ ] Configure downloadable and virtual eBook products.
- [ ] Define required product fields and metadata.
- [ ] Add eBook categories and taxonomy behavior.
- [ ] Configure protected product files.
- [!] Add real products, covers, prices, and files when supplied.

## Task 5 — Build the custom eBooks page

- [x] Create and publish the `/ebooks/` page with its custom template.
- [x] Build the branded hero section.
- [x] Build the responsive product grid.
- [x] Build reusable Tailwind product cards.
- [x] Add accessible client-side category filters for the initial catalog.
- [!] Add WooCommerce-powered search, pagination, and empty/loading states after products and WooCommerce are available.
- [x] Test the initial landing page at desktop and mobile viewport sizes.

## Task 6 — Build the eBook product experience

- [x] Create the initial dynamic eBook detail template.
- [x] Present the cover, description, price, category, and learning outcomes.
- [x] Add quantity increase/decrease controls with accessible limits.
- [x] Add a working browser-persistent Add to Cart interaction and cart count.
- [x] Add a strong purchase call to action.
- [x] Add benefits and trust indicators.
- [ ] Add related eBooks.
- [!] Connect the detail page and cart to WooCommerce after WooCommerce is installed.
- [~] Test desktop, tablet, and mobile layouts.

## Task 7 — Build the custom checkout

- [x] Build the responsive frontend cart page.
- [x] Render saved eBooks with cover, title, unit price, and line total.
- [x] Add cart quantity updates, remove-item, clear-cart, totals, and empty state.
- [!] Connect the cart to WooCommerce sessions after WooCommerce is installed.
- [x] Create the initial mobile-first one-page checkout.
- [x] Build customer information fields.
- [x] Build a live professional order summary from the browser cart.
- [x] Build CC Avenue and cryptocurrency payment selection interfaces.
- [~] Add client-side validation; server-side processing follows with the payment plugin.
- [x] Add accessible error and success states.
- [x] Create a dedicated branded thank-you page with payment-specific next steps.
- [x] Redirect successful frontend checkout submissions to the thank-you page.
- [x] Add trust and secure-payment indicators.
- [!] Connect real CC Avenue redirection after merchant credentials are supplied.
- [!] Store crypto submissions and orders server-side after wallet configuration is supplied.

## Task 8 — Develop the crypto payment workflow

- [ ] Add USDT, BTC, and ETH configuration.
- [ ] Add network and wallet address configuration.
- [ ] Calculate and display the payable crypto amount.
- [ ] Display wallet details and QR codes.
- [ ] Add copy-to-clipboard interactions.
- [ ] Collect the buyer name, email, and transaction hash.
- [ ] Validate, sanitize, and securely store submissions.
- [ ] Prevent duplicate transaction submissions.
- [!] Add production wallet addresses and networks when supplied.

## Task 9 — Develop crypto administration

- [ ] Add a WordPress admin transaction screen.
- [ ] Add pending, paid, rejected, and delivered statuses.
- [ ] Add transaction details and admin notes.
- [ ] Add secure approve and reject actions.
- [ ] Generate or update the WooCommerce order after approval.
- [ ] Record the administrator and verification time.
- [ ] Add admin filtering and search.

## Task 10 — Integrate CC Avenue

- [ ] Create the CC Avenue WooCommerce gateway.
- [ ] Build secure request generation.
- [ ] Build encrypted response verification.
- [ ] Handle success, failure, cancellation, and retry flows.
- [ ] Prevent duplicate callbacks and duplicate orders.
- [ ] Store gateway transaction references.
- [!] Complete sandbox testing when credentials are supplied.
- [!] Complete production testing when live credentials are supplied.

## Task 11 — Implement secure eBook delivery

- [ ] Prevent direct public access to protected eBook files.
- [ ] Generate signed, expiring download links.
- [ ] Enforce customer, order, expiry, and download-limit checks.
- [ ] Stream authorized downloads securely.
- [ ] Record delivery and download activity.
- [ ] Provide clear expired or invalid-link messages.

## Task 12 — Create the email system

- [ ] Create branded, responsive HTML email templates.
- [ ] Send crypto-submission confirmation.
- [ ] Send payment confirmation and secure download delivery.
- [ ] Send rejected or failed-payment notices.
- [ ] Send administrator notifications.
- [ ] Test email rendering and delivery behavior.

## Task 13 — Test, secure, and optimize

- [ ] Run PHP syntax and WordPress coding checks.
- [ ] Test responsive behavior and supported browsers.
- [ ] Test payment success, failure, cancellation, and duplicate callbacks.
- [ ] Test validation, sanitization, nonces, and permissions.
- [ ] Test secure links, expiry, and download limits.
- [ ] Test accessibility and keyboard behavior.
- [ ] Optimize Tailwind output, assets, database queries, and caching.
- [ ] Confirm production error handling and logging.

## Task 14 — Prepare assessment deliverables

- [ ] Write the project README.
- [ ] Write installation and configuration instructions.
- [ ] Document Tailwind development and production builds.
- [ ] Document crypto and CC Avenue setup.
- [ ] Capture completed-page screenshots.
- [ ] Prepare the 5–10 minute walkthrough outline.
- [ ] Prepare a live demo deployment checklist.
- [ ] Complete the final acceptance checklist.

## Required inputs and external dependencies

- [!] WELSGLOBAL brand guidelines, logo assets, and approved fonts.
- [!] Final eBook catalog, covers, prices, descriptions, and downloadable files.
- [!] Approved cryptocurrency wallet addresses and networks.
- [!] Crypto price/conversion source and pricing rules.
- [!] CC Avenue sandbox and production credentials.
- [!] SMTP or transactional email credentials.
- [!] Production domain/server access for deployment and live testing.

## Update rule

This file must be updated whenever a subtask starts, completes, becomes blocked, or changes scope. A main task is marked complete only after its implementation and relevant verification steps pass.
