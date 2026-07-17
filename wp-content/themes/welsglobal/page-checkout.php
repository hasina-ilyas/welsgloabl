<?php
/**
 * Template Name: eBook Checkout
 * Template Post Type: page
 *
 * @package WELSGLOBAL
 */

get_header();
?>

<section class="border-b border-slate-200 bg-brand-cream">
	<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">
		<div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
			<div>
				<nav class="mb-3 flex items-center gap-2 text-xs font-medium text-slate-500" aria-label="<?php esc_attr_e( 'Breadcrumb', 'welsglobal' ); ?>">
					<a class="hover:text-brand-blue" href="<?php echo esc_url( home_url( '/cart/' ) ); ?>"><?php esc_html_e( 'Cart', 'welsglobal' ); ?></a>
					<span aria-hidden="true">/</span>
					<span class="text-brand-navy"><?php esc_html_e( 'Checkout', 'welsglobal' ); ?></span>
				</nav>
				<h1 class="font-display text-3xl font-bold tracking-tight text-brand-navy sm:text-4xl"><?php esc_html_e( 'Complete your purchase', 'welsglobal' ); ?></h1>
			</div>
			<div class="inline-flex items-center gap-2 text-xs font-bold text-emerald-700">
				<span class="grid size-8 place-items-center rounded-full bg-emerald-100">
					<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
				</span>
				<?php esc_html_e( 'Secure checkout', 'welsglobal' ); ?>
			</div>
		</div>
	</div>
</section>

<section class="bg-slate-50 py-10 sm:py-14 lg:py-16" data-checkout-page>
	<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
		<div class="hidden min-h-[28rem] place-items-center rounded-3xl border border-dashed border-slate-300 bg-white p-10 text-center" data-checkout-empty>
			<div>
				<span class="mx-auto grid size-16 place-items-center rounded-full bg-brand-cream text-brand-blue">
					<svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 4h2l2.2 10.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6L20 8H7"/></svg>
				</span>
				<h2 class="mt-5 font-display text-2xl font-bold text-brand-navy"><?php esc_html_e( 'Your cart is empty', 'welsglobal' ); ?></h2>
				<p class="mt-2 text-sm text-slate-600"><?php esc_html_e( 'Add an eBook before continuing to checkout.', 'welsglobal' ); ?></p>
				<a class="mt-6 inline-flex min-h-12 items-center rounded-full bg-brand-gold px-7 text-sm font-black text-brand-navy" href="<?php echo esc_url( home_url( '/ebooks/' ) ); ?>"><?php esc_html_e( 'Browse eBooks', 'welsglobal' ); ?></a>
			</div>
		</div>

		<div class="grid gap-8 lg:grid-cols-[1fr_25rem] lg:items-start" data-checkout-content>
			<form class="space-y-6" data-checkout-form novalidate>
				<section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
					<div class="flex items-center gap-3 border-b border-slate-100 pb-5">
						<span class="grid size-9 place-items-center rounded-full bg-brand-navy text-sm font-bold text-brand-gold">1</span>
						<div>
							<h2 class="font-display text-xl font-bold text-brand-navy"><?php esc_html_e( 'Your details', 'welsglobal' ); ?></h2>
							<p class="mt-0.5 text-xs text-slate-500"><?php esc_html_e( 'We will send your receipt and secure download here.', 'welsglobal' ); ?></p>
						</div>
					</div>
					<div class="mt-6 grid gap-5 sm:grid-cols-2">
						<label class="block">
							<span class="mb-2 block text-xs font-bold text-brand-navy"><?php esc_html_e( 'First name', 'welsglobal' ); ?> <span class="text-red-500">*</span></span>
							<input class="h-12 w-full rounded-xl border border-slate-300 bg-white px-4 text-sm outline-none transition placeholder:text-slate-400 focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/10" type="text" name="first_name" autocomplete="given-name" required placeholder="<?php esc_attr_e( 'Your first name', 'welsglobal' ); ?>">
							<span class="mt-1.5 hidden text-xs text-red-600" data-field-error></span>
						</label>
						<label class="block">
							<span class="mb-2 block text-xs font-bold text-brand-navy"><?php esc_html_e( 'Last name', 'welsglobal' ); ?> <span class="text-red-500">*</span></span>
							<input class="h-12 w-full rounded-xl border border-slate-300 bg-white px-4 text-sm outline-none transition placeholder:text-slate-400 focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/10" type="text" name="last_name" autocomplete="family-name" required placeholder="<?php esc_attr_e( 'Your last name', 'welsglobal' ); ?>">
							<span class="mt-1.5 hidden text-xs text-red-600" data-field-error></span>
						</label>
						<label class="block sm:col-span-2">
							<span class="mb-2 block text-xs font-bold text-brand-navy"><?php esc_html_e( 'Email address', 'welsglobal' ); ?> <span class="text-red-500">*</span></span>
							<input class="h-12 w-full rounded-xl border border-slate-300 bg-white px-4 text-sm outline-none transition placeholder:text-slate-400 focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/10" type="email" name="email" autocomplete="email" required placeholder="you@example.com">
							<span class="mt-1.5 hidden text-xs text-red-600" data-field-error></span>
						</label>
						<label class="block">
							<span class="mb-2 block text-xs font-bold text-brand-navy"><?php esc_html_e( 'Country / region', 'welsglobal' ); ?> <span class="text-red-500">*</span></span>
							<select class="h-12 w-full rounded-xl border border-slate-300 bg-white px-4 text-sm outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/10" name="country" required>
								<option value=""><?php esc_html_e( 'Select country', 'welsglobal' ); ?></option>
								<option value="AE"><?php esc_html_e( 'United Arab Emirates', 'welsglobal' ); ?></option>
								<option value="PK"><?php esc_html_e( 'Pakistan', 'welsglobal' ); ?></option>
								<option value="US"><?php esc_html_e( 'United States', 'welsglobal' ); ?></option>
								<option value="GB"><?php esc_html_e( 'United Kingdom', 'welsglobal' ); ?></option>
								<option value="SA"><?php esc_html_e( 'Saudi Arabia', 'welsglobal' ); ?></option>
								<option value="IN"><?php esc_html_e( 'India', 'welsglobal' ); ?></option>
								<option value="other"><?php esc_html_e( 'Other', 'welsglobal' ); ?></option>
							</select>
							<span class="mt-1.5 hidden text-xs text-red-600" data-field-error></span>
						</label>
						<label class="block">
							<span class="mb-2 block text-xs font-bold text-brand-navy"><?php esc_html_e( 'Phone number', 'welsglobal' ); ?> <span class="font-normal text-slate-400"><?php esc_html_e( '(optional)', 'welsglobal' ); ?></span></span>
							<input class="h-12 w-full rounded-xl border border-slate-300 bg-white px-4 text-sm outline-none transition placeholder:text-slate-400 focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/10" type="tel" name="phone" autocomplete="tel" placeholder="+971">
						</label>
					</div>
				</section>

				<section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
					<div class="flex items-center gap-3 border-b border-slate-100 pb-5">
						<span class="grid size-9 place-items-center rounded-full bg-brand-navy text-sm font-bold text-brand-gold">2</span>
						<div>
							<h2 class="font-display text-xl font-bold text-brand-navy"><?php esc_html_e( 'Payment method', 'welsglobal' ); ?></h2>
							<p class="mt-0.5 text-xs text-slate-500"><?php esc_html_e( 'Choose how you would like to pay.', 'welsglobal' ); ?></p>
						</div>
					</div>

					<div class="mt-6 grid gap-3 sm:grid-cols-2" data-payment-tabs>
						<label class="relative cursor-pointer rounded-2xl border-2 border-brand-blue bg-brand-blue/5 p-4 transition" data-payment-option>
							<input class="peer sr-only" type="radio" name="payment_method" value="card" checked>
							<span class="flex items-center gap-3">
								<span class="grid size-10 place-items-center rounded-xl bg-white text-brand-blue shadow-sm"><svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18M7 15h3"/></svg></span>
								<span><strong class="block text-sm text-brand-navy"><?php esc_html_e( 'Credit / Debit Card', 'welsglobal' ); ?></strong><small class="text-xs text-slate-500"><?php esc_html_e( 'Securely via CC Avenue', 'welsglobal' ); ?></small></span>
							</span>
						</label>
						<label class="relative cursor-pointer rounded-2xl border-2 border-slate-200 p-4 transition" data-payment-option>
							<input class="peer sr-only" type="radio" name="payment_method" value="crypto">
							<span class="flex items-center gap-3">
								<span class="grid size-10 place-items-center rounded-xl bg-slate-50 text-brand-blue"><svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M9 8h4.5a2.5 2.5 0 0 1 0 5H9m3-5V6m0 9v3m-3-5h5.5a2.5 2.5 0 0 1 0 5H9"/></svg></span>
								<span><strong class="block text-sm text-brand-navy"><?php esc_html_e( 'Cryptocurrency', 'welsglobal' ); ?></strong><small class="text-xs text-slate-500"><?php esc_html_e( 'USDT, BTC, or ETH', 'welsglobal' ); ?></small></span>
							</span>
						</label>
					</div>

					<div class="mt-5 rounded-2xl border border-slate-200 bg-slate-50 p-5" data-card-panel>
						<div class="flex gap-3">
							<svg class="mt-0.5 size-5 shrink-0 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3 4 7v5c0 5 3.4 8 8 9 4.6-1 8-4 8-9V7z"/><path d="m9 12 2 2 4-4"/></svg>
							<div>
								<h3 class="text-sm font-bold text-brand-navy"><?php esc_html_e( 'Your card details stay protected', 'welsglobal' ); ?></h3>
								<p class="mt-1 text-xs leading-6 text-slate-600"><?php esc_html_e( 'After placing your order, you will be redirected to the secure CC Avenue payment page. WELSGLOBAL does not store your card number.', 'welsglobal' ); ?></p>
							</div>
						</div>
					</div>

					<div class="mt-5 hidden space-y-5 rounded-2xl border border-brand-blue/20 bg-brand-blue/5 p-5" data-crypto-panel>
						<label class="block">
							<span class="mb-2 block text-xs font-bold text-brand-navy"><?php esc_html_e( 'Select cryptocurrency', 'welsglobal' ); ?></span>
							<select class="h-12 w-full rounded-xl border border-slate-300 bg-white px-4 text-sm outline-none focus:border-brand-blue" name="cryptocurrency" data-crypto-select>
								<option value="USDT">USDT</option>
								<option value="BTC">Bitcoin (BTC)</option>
								<option value="ETH">Ethereum (ETH)</option>
							</select>
						</label>
						<div class="grid gap-4 sm:grid-cols-[1fr_auto]">
							<div class="rounded-xl bg-white p-4">
								<span class="text-[10px] font-bold uppercase tracking-wider text-slate-500"><?php esc_html_e( 'Network', 'welsglobal' ); ?></span>
								<strong class="mt-1 block text-sm text-brand-navy" data-crypto-network>TRC20</strong>
								<span class="mt-4 block text-[10px] font-bold uppercase tracking-wider text-slate-500"><?php esc_html_e( 'Wallet address', 'welsglobal' ); ?></span>
								<div class="mt-1 flex items-center gap-2">
									<code class="min-w-0 flex-1 truncate text-xs text-brand-navy" data-wallet-address>Wallet provided at order confirmation</code>
									<button class="text-xs font-bold text-brand-blue" type="button" data-copy-wallet><?php esc_html_e( 'Copy', 'welsglobal' ); ?></button>
								</div>
							</div>
							<div class="grid size-28 place-items-center rounded-xl border border-slate-200 bg-white p-3 text-center">
								<svg class="size-16 text-brand-navy/70" viewBox="0 0 64 64" fill="currentColor" aria-label="<?php esc_attr_e( 'QR code placeholder', 'welsglobal' ); ?>"><path d="M4 4h22v22H4zm5 5v12h12V9zM38 4h22v22H38zm5 5v12h12V9zM4 38h22v22H4zm5 5v12h12V43zM33 32h7v7h-7zm9 0h7v7h-7zm9 0h9v7h-9zM32 42h7v18h-7zm10 0h7v7h-7zm9 0h9v7h-9zm-9 11h7v7h-7zm10 0h8v7h-8z"/></svg>
							</div>
						</div>
						<label class="block">
							<span class="mb-2 block text-xs font-bold text-brand-navy"><?php esc_html_e( 'Transaction hash / ID', 'welsglobal' ); ?> <span class="text-red-500">*</span></span>
							<input class="h-12 w-full rounded-xl border border-slate-300 bg-white px-4 text-sm outline-none focus:border-brand-blue" type="text" name="transaction_hash" placeholder="<?php esc_attr_e( 'Enter after completing the transfer', 'welsglobal' ); ?>">
							<span class="mt-1.5 hidden text-xs text-red-600" data-field-error></span>
						</label>
						<p class="text-xs leading-5 text-slate-500"><?php esc_html_e( 'Crypto orders remain pending until an administrator verifies the transaction on the selected network.', 'welsglobal' ); ?></p>
					</div>
				</section>

				<label class="flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4">
					<input class="mt-0.5 size-4 rounded border-slate-300 text-brand-blue focus:ring-brand-blue" type="checkbox" name="terms" required>
					<span class="text-xs leading-6 text-slate-600"><?php esc_html_e( 'I agree to the Terms & Conditions and Privacy Policy, and understand that digital products are delivered electronically.', 'welsglobal' ); ?></span>
				</label>

				<div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700 hidden" role="alert" data-checkout-error></div>

				<button class="inline-flex min-h-14 w-full items-center justify-center gap-3 rounded-full bg-brand-gold px-8 text-sm font-black text-brand-navy shadow-lg shadow-brand-gold/20 transition hover:-translate-y-0.5 hover:bg-amber-300 disabled:cursor-wait disabled:opacity-70" type="submit" data-place-order>
					<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
					<span data-place-order-label><?php esc_html_e( 'Place secure order', 'welsglobal' ); ?></span>
				</button>
			</form>

			<aside class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7 lg:sticky lg:top-6">
				<div class="flex items-center justify-between">
					<h2 class="font-display text-xl font-bold text-brand-navy"><?php esc_html_e( 'Order summary', 'welsglobal' ); ?></h2>
					<a class="text-xs font-bold text-brand-blue hover:underline" href="<?php echo esc_url( home_url( '/cart/' ) ); ?>"><?php esc_html_e( 'Edit cart', 'welsglobal' ); ?></a>
				</div>
				<div class="mt-6 max-h-72 space-y-4 overflow-y-auto pr-1" data-checkout-items></div>
				<div class="mt-6 space-y-3 border-t border-slate-200 pt-5 text-sm">
					<div class="flex justify-between text-slate-600"><span><?php esc_html_e( 'Subtotal', 'welsglobal' ); ?></span><strong class="text-brand-navy" data-checkout-subtotal>$0.00</strong></div>
					<div class="flex justify-between text-slate-600"><span><?php esc_html_e( 'Delivery', 'welsglobal' ); ?></span><strong class="text-emerald-600"><?php esc_html_e( 'Free', 'welsglobal' ); ?></strong></div>
					<div class="flex items-end justify-between border-t border-slate-200 pt-4"><span class="font-bold text-brand-navy"><?php esc_html_e( 'Total', 'welsglobal' ); ?></span><span class="font-display text-3xl font-bold text-brand-navy" data-checkout-total>$0.00</span></div>
				</div>
				<div class="mt-6 rounded-2xl bg-brand-cream p-4 text-xs leading-6 text-slate-600">
					<strong class="block text-brand-navy"><?php esc_html_e( 'Instant digital delivery', 'welsglobal' ); ?></strong>
					<?php esc_html_e( 'Your secure eBook links will be emailed after successful payment verification.', 'welsglobal' ); ?>
				</div>
			</aside>
		</div>

		<div class="hidden min-h-[30rem] place-items-center rounded-3xl border border-emerald-200 bg-white p-8 text-center shadow-sm" data-checkout-success>
			<div class="max-w-xl">
				<span class="mx-auto grid size-20 place-items-center rounded-full bg-emerald-100 text-emerald-700">
					<svg class="size-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="m5 12 4 4L19 6"/></svg>
				</span>
				<p class="mt-6 text-xs font-bold uppercase tracking-[.2em] text-emerald-700"><?php esc_html_e( 'Order received', 'welsglobal' ); ?></p>
				<h2 class="mt-2 font-display text-3xl font-bold text-brand-navy"><?php esc_html_e( 'Thank you for your purchase.', 'welsglobal' ); ?></h2>
				<p class="mt-4 text-sm leading-7 text-slate-600" data-success-message></p>
				<p class="mt-4 rounded-xl bg-brand-cream px-4 py-3 text-sm font-bold text-brand-navy"><?php esc_html_e( 'Reference:', 'welsglobal' ); ?> <span data-order-reference></span></p>
				<a class="mt-7 inline-flex min-h-12 items-center rounded-full bg-brand-navy px-7 text-sm font-bold text-white" href="<?php echo esc_url( home_url( '/ebooks/' ) ); ?>"><?php esc_html_e( 'Back to eBooks', 'welsglobal' ); ?></a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
