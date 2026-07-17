<?php
/**
 * Template Name: eBook Cart
 * Template Post Type: page
 *
 * @package WELSGLOBAL
 */

get_header();
?>

<section class="border-b border-slate-200 bg-brand-cream">
	<div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 sm:py-14 lg:px-8">
		<nav class="mb-5 flex items-center gap-2 text-xs font-medium text-slate-500" aria-label="<?php esc_attr_e( 'Breadcrumb', 'welsglobal' ); ?>">
			<a class="transition hover:text-brand-blue" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'welsglobal' ); ?></a>
			<span aria-hidden="true">/</span>
			<a class="transition hover:text-brand-blue" href="<?php echo esc_url( home_url( '/ebooks/' ) ); ?>"><?php esc_html_e( 'eBooks', 'welsglobal' ); ?></a>
			<span aria-hidden="true">/</span>
			<span class="text-brand-navy"><?php esc_html_e( 'Cart', 'welsglobal' ); ?></span>
		</nav>
		<div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
			<div>
				<p class="text-xs font-bold uppercase tracking-[.2em] text-brand-blue"><?php esc_html_e( 'Your selections', 'welsglobal' ); ?></p>
				<h1 class="mt-2 font-display text-4xl font-bold tracking-tight text-brand-navy sm:text-5xl"><?php esc_html_e( 'Shopping cart', 'welsglobal' ); ?></h1>
			</div>
			<a class="inline-flex items-center gap-2 text-sm font-bold text-brand-blue hover:text-brand-navy" href="<?php echo esc_url( home_url( '/ebooks/' ) ); ?>">
				<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
				<?php esc_html_e( 'Continue browsing', 'welsglobal' ); ?>
			</a>
		</div>
	</div>
</section>

<section class="bg-white py-12 sm:py-16 lg:py-20" data-cart-page>
	<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
		<div class="hidden min-h-[24rem] place-items-center rounded-3xl border border-dashed border-slate-300 bg-slate-50 px-6 py-16 text-center" data-empty-cart>
			<div>
				<span class="mx-auto grid size-20 place-items-center rounded-full bg-brand-cream text-brand-blue">
					<svg class="size-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 4h2l2.2 10.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6L20 8H7"/><circle cx="10" cy="20" r="1"/><circle cx="17" cy="20" r="1"/></svg>
				</span>
				<h2 class="mt-6 font-display text-2xl font-bold text-brand-navy"><?php esc_html_e( 'Your cart is waiting for a good strategy.', 'welsglobal' ); ?></h2>
				<p class="mx-auto mt-3 max-w-md text-sm leading-7 text-slate-600"><?php esc_html_e( 'Explore the Executive Strategy Series and add a practical guide for your next growth move.', 'welsglobal' ); ?></p>
				<a class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-brand-gold px-7 text-sm font-black text-brand-navy transition hover:bg-amber-300" href="<?php echo esc_url( home_url( '/ebooks/' ) ); ?>"><?php esc_html_e( 'Explore eBooks', 'welsglobal' ); ?></a>
			</div>
		</div>

		<div class="grid gap-10 lg:grid-cols-[1fr_23rem] lg:items-start" data-filled-cart>
			<div>
				<div class="mb-5 flex items-center justify-between">
					<h2 class="font-display text-xl font-bold text-brand-navy">
						<span data-cart-items-label>0 <?php esc_html_e( 'items', 'welsglobal' ); ?></span>
					</h2>
					<button class="text-xs font-bold text-slate-500 underline decoration-slate-300 underline-offset-4 transition hover:text-red-600" type="button" data-clear-cart><?php esc_html_e( 'Clear cart', 'welsglobal' ); ?></button>
				</div>
				<div class="space-y-4" data-cart-items aria-live="polite"></div>
			</div>

			<aside class="rounded-3xl bg-brand-navy p-6 text-white shadow-2xl shadow-brand-navy/15 sm:p-7 lg:sticky lg:top-6">
				<div class="flex items-center justify-between">
					<h2 class="font-display text-xl font-bold"><?php esc_html_e( 'Order summary', 'welsglobal' ); ?></h2>
					<svg class="size-5 text-brand-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M6 3h12v18l-3-2-3 2-3-2-3 2z"/><path d="M9 8h6M9 12h6"/></svg>
				</div>
				<div class="mt-7 space-y-4 border-b border-white/10 pb-6 text-sm">
					<div class="flex justify-between gap-4 text-slate-300">
						<span><?php esc_html_e( 'Subtotal', 'welsglobal' ); ?></span>
						<span class="font-bold text-white" data-cart-subtotal>$0.00</span>
					</div>
					<div class="flex justify-between gap-4 text-slate-300">
						<span><?php esc_html_e( 'Digital delivery', 'welsglobal' ); ?></span>
						<span class="font-bold text-emerald-400"><?php esc_html_e( 'Free', 'welsglobal' ); ?></span>
					</div>
					<div class="flex justify-between gap-4 text-slate-300">
						<span><?php esc_html_e( 'Taxes', 'welsglobal' ); ?></span>
						<span class="text-xs"><?php esc_html_e( 'Calculated at checkout', 'welsglobal' ); ?></span>
					</div>
				</div>
				<div class="flex items-end justify-between gap-4 py-6">
					<span class="font-bold"><?php esc_html_e( 'Total', 'welsglobal' ); ?></span>
					<div class="text-right">
						<span class="block font-display text-3xl font-bold" data-cart-total>$0.00</span>
						<span class="text-[10px] uppercase tracking-wider text-slate-400">USD</span>
					</div>
				</div>
				<a class="inline-flex min-h-14 w-full items-center justify-center gap-2 rounded-full bg-brand-gold px-6 text-sm font-black text-brand-navy transition hover:-translate-y-0.5 hover:bg-amber-300" href="<?php echo esc_url( home_url( '/checkout/' ) ); ?>">
					<?php esc_html_e( 'Proceed to checkout', 'welsglobal' ); ?>
					<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
				</a>
				<div class="mt-5 flex items-center justify-center gap-2 text-[11px] font-medium text-slate-400">
					<svg class="size-3.5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
					<?php esc_html_e( 'Secure checkout · Protected delivery', 'welsglobal' ); ?>
				</div>
			</aside>
		</div>
	</div>
</section>

<template id="cart-item-template">
	<article class="grid gap-5 rounded-3xl border border-slate-200 bg-white p-4 shadow-sm transition hover:border-brand-gold/40 sm:grid-cols-[7.5rem_1fr] sm:p-5">
		<a class="relative mx-auto aspect-[3/4.2] w-28 overflow-hidden rounded-r-md text-white shadow-lg sm:mx-0 sm:w-full" data-item-link>
			<div class="absolute inset-0 bg-gradient-to-br" data-item-cover></div>
			<div class="relative flex h-full flex-col p-3">
				<span class="text-[6px] font-black uppercase tracking-[.2em] text-white/75">WELSGLOBAL</span>
				<span class="mt-auto text-xs font-black leading-tight" data-item-cover-title></span>
				<span class="mt-2 text-[6px] uppercase tracking-wider text-white/60">Executive Series</span>
			</div>
		</a>
		<div class="flex min-w-0 flex-col">
			<div class="flex items-start justify-between gap-4">
				<div>
					<span class="text-[10px] font-bold uppercase tracking-[.16em] text-brand-blue" data-item-category></span>
					<h3 class="mt-1 font-display text-lg font-bold leading-snug text-brand-navy">
						<a class="hover:text-brand-blue" data-item-link data-item-title></a>
					</h3>
					<p class="mt-1 text-xs text-slate-500"><?php esc_html_e( 'Digital PDF · Secure email delivery', 'welsglobal' ); ?></p>
				</div>
				<button class="grid size-9 shrink-0 place-items-center rounded-full text-slate-400 transition hover:bg-red-50 hover:text-red-600" type="button" data-remove-item aria-label="<?php esc_attr_e( 'Remove item', 'welsglobal' ); ?>">
					<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 7h16M9 7V4h6v3m-9 0 1 14h10l1-14M10 11v6M14 11v6"/></svg>
				</button>
			</div>
			<div class="mt-auto flex flex-wrap items-end justify-between gap-4 pt-5">
				<div>
					<span class="mb-1.5 block text-[10px] font-bold uppercase tracking-wider text-slate-500"><?php esc_html_e( 'Quantity', 'welsglobal' ); ?></span>
					<div class="inline-flex h-10 items-center rounded-full border border-slate-300 px-1">
						<button class="grid size-8 place-items-center rounded-full text-slate-500 hover:bg-slate-100" type="button" data-cart-minus aria-label="<?php esc_attr_e( 'Decrease quantity', 'welsglobal' ); ?>">−</button>
						<input class="w-9 border-0 bg-transparent p-0 text-center text-sm font-bold text-brand-navy outline-none" type="number" min="1" max="10" inputmode="numeric" data-cart-quantity>
						<button class="grid size-8 place-items-center rounded-full text-slate-500 hover:bg-slate-100" type="button" data-cart-plus aria-label="<?php esc_attr_e( 'Increase quantity', 'welsglobal' ); ?>">+</button>
					</div>
				</div>
				<div class="text-right">
					<span class="block text-xs text-slate-500" data-item-unit-price></span>
					<span class="font-display text-2xl font-bold text-brand-navy" data-item-total></span>
				</div>
			</div>
		</div>
	</article>
</template>

<?php
get_footer();
