# 5–10 Minute Video Walkthrough

## 0:00–0:45 — Objective and architecture

- Explain the assessment objective.
- Show the custom WELSGLOBAL theme and eBooks plugin.
- Explain why WooCommerce owns products, sessions, orders, permissions, and email events.
- Explain why crypto verification and brand-specific behavior live in the custom plugin.

## 0:45–2:15 — Storefront

- Open `/ebooks/`.
- Explain the live-brand reference and Tailwind token system.
- Demonstrate responsive collection cards and filtering.
- Open a product detail page.
- Show the product information, author context, quantity control, and Add to Cart.

## 2:15–3:15 — Cart and checkout

- Show the WooCommerce-backed cart.
- Change quantity and explain server-calculated totals.
- Open checkout.
- Point out customer fields, order summary, validation, and gateway area.
- Explain that WordPress never stores raw card details.

## 3:15–5:15 — Crypto workflow

- Open WooCommerce payment settings.
- Show wallet/network configuration and safe unavailable-by-default behavior.
- Explain transaction-hash validation and duplicate protection.
- Show an on-hold crypto order.
- Demonstrate the verify/reject order actions.
- Explain administrator/time audit metadata.

## 5:15–6:15 — Delivery and emails

- Show virtual/downloadable product settings.
- Explain forced downloads and WooCommerce permissions.
- Show download logs.
- Show branded email configuration and crypto pending subject behavior.

## 6:15–7:15 — Security and quality

- Highlight sanitization, permission checks, duplicate prevention, and no secrets in code.
- Show PHP/JavaScript/build validation.
- Demonstrate mobile/tablet layouts.

## 7:15–8:00 — Blockers and production handoff

- State that final PDFs/covers, approved wallet/rate source, CC Avenue merchant kit/credentials, SMTP, and hosting access are deployment inputs.
- Show installation and QA documentation.
- Explain the final sandbox and production verification plan.
