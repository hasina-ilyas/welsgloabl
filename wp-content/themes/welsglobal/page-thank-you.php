<?php
/**
 * Template Name: eBook Thank You
 * Template Post Type: page
 *
 * @package WELSGLOBAL
 */

get_header();
?>

<section class="relative isolate overflow-hidden bg-brand-navy py-16 text-white sm:py-20 lg:py-24">
	<div class="absolute inset-0 -z-10 opacity-50" aria-hidden="true">
		<div class="absolute -right-20 -top-32 size-[30rem] rounded-full bg-brand-blue/50 blur-3xl"></div>
		<div class="absolute -bottom-40 left-1/4 size-[26rem] rounded-full bg-brand-gold/20 blur-3xl"></div>
		<div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,.035)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.035)_1px,transparent_1px)] bg-[size:54px_54px]"></div>
	</div>
	<div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8" data-thank-you-page>
		<div class="relative mx-auto grid size-24 place-items-center">
			<div class="absolute inset-0 animate-ping rounded-full bg-emerald-400/15"></div>
			<div class="relative grid size-20 place-items-center rounded-full border border-emerald-300/30 bg-emerald-400/15 text-emerald-300 shadow-2xl shadow-emerald-500/10">
				<svg class="size-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg>
			</div>
		</div>
		<p class="mt-7 text-xs font-extrabold uppercase tracking-[.24em] text-brand-gold"><?php esc_html_e( 'Order received', 'welsglobal' ); ?></p>
		<h1 class="mt-3 font-display text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl"><?php esc_html_e( 'Thank you for investing', 'welsglobal' ); ?><span class="block text-brand-gold"><?php esc_html_e( 'in your next move.', 'welsglobal' ); ?></span></h1>
		<p class="mx-auto mt-6 max-w-2xl text-base leading-8 text-slate-300" data-thank-you-intro><?php esc_html_e( 'Your order has been received. We are preparing the next steps and will keep you updated by email.', 'welsglobal' ); ?></p>
		<div class="mx-auto mt-8 inline-flex flex-col items-center gap-1 rounded-2xl border border-white/15 bg-white/5 px-8 py-4 backdrop-blur sm:flex-row sm:gap-4">
			<span class="text-xs font-bold uppercase tracking-wider text-slate-400"><?php esc_html_e( 'Order reference', 'welsglobal' ); ?></span>
			<span class="font-display text-lg font-bold text-white" data-thank-you-reference>WG-PENDING</span>
		</div>
	</div>
</section>

<section class="relative z-10 -mt-8 pb-16 sm:pb-20" data-thank-you-content>
	<div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
		<div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-brand-navy/10">
			<div class="grid md:grid-cols-[1.15fr_.85fr]">
				<div class="p-6 sm:p-9 lg:p-10">
					<div class="flex items-center gap-3">
						<span class="grid size-10 place-items-center rounded-xl bg-brand-blue/10 text-brand-blue">
							<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 5h16v14H4z"/><path d="m4 7 8 6 8-6"/></svg>
						</span>
						<div>
							<p class="text-[10px] font-bold uppercase tracking-[.18em] text-brand-blue"><?php esc_html_e( 'Confirmation email', 'welsglobal' ); ?></p>
							<h2 class="font-display text-xl font-bold text-brand-navy"><?php esc_html_e( 'Check your inbox', 'welsglobal' ); ?></h2>
						</div>
					</div>
					<p class="mt-5 text-sm leading-7 text-slate-600"><?php esc_html_e( 'Your order details and payment instructions are being sent to', 'welsglobal' ); ?> <strong class="text-brand-navy" data-thank-you-email><?php esc_html_e( 'your email address', 'welsglobal' ); ?></strong>.</p>
					<div class="mt-7 space-y-5">
						<div class="flex gap-4">
							<span class="grid size-8 shrink-0 place-items-center rounded-full bg-brand-navy text-xs font-bold text-brand-gold">1</span>
							<div><h3 class="text-sm font-bold text-brand-navy" data-step-one-title><?php esc_html_e( 'Payment confirmation', 'welsglobal' ); ?></h3><p class="mt-1 text-xs leading-6 text-slate-500" data-step-one-copy><?php esc_html_e( 'Your payment status will be confirmed securely.', 'welsglobal' ); ?></p></div>
						</div>
						<div class="flex gap-4">
							<span class="grid size-8 shrink-0 place-items-center rounded-full bg-brand-navy text-xs font-bold text-brand-gold">2</span>
							<div><h3 class="text-sm font-bold text-brand-navy"><?php esc_html_e( 'Secure delivery', 'welsglobal' ); ?></h3><p class="mt-1 text-xs leading-6 text-slate-500"><?php esc_html_e( 'A protected eBook download link will be emailed after successful verification.', 'welsglobal' ); ?></p></div>
						</div>
						<div class="flex gap-4">
							<span class="grid size-8 shrink-0 place-items-center rounded-full bg-brand-navy text-xs font-bold text-brand-gold">3</span>
							<div><h3 class="text-sm font-bold text-brand-navy"><?php esc_html_e( 'Put strategy to work', 'welsglobal' ); ?></h3><p class="mt-1 text-xs leading-6 text-slate-500"><?php esc_html_e( 'Download your guide and turn its frameworks into your next focused action.', 'welsglobal' ); ?></p></div>
						</div>
					</div>
				</div>
				<aside class="bg-brand-cream p-6 sm:p-9 lg:p-10">
					<p class="text-[10px] font-bold uppercase tracking-[.18em] text-brand-blue"><?php esc_html_e( 'Order snapshot', 'welsglobal' ); ?></p>
					<div class="mt-5 space-y-4 border-y border-brand-navy/10 py-5 text-sm">
						<div class="flex justify-between gap-4"><span class="text-slate-500"><?php esc_html_e( 'Items', 'welsglobal' ); ?></span><strong class="text-brand-navy" data-thank-you-items>0</strong></div>
						<div class="flex justify-between gap-4"><span class="text-slate-500"><?php esc_html_e( 'Payment', 'welsglobal' ); ?></span><strong class="text-right text-brand-navy" data-thank-you-method><?php esc_html_e( 'Pending', 'welsglobal' ); ?></strong></div>
						<div class="flex items-end justify-between gap-4"><span class="text-slate-500"><?php esc_html_e( 'Total', 'welsglobal' ); ?></span><strong class="font-display text-2xl text-brand-navy" data-thank-you-total>$0.00</strong></div>
					</div>
					<div class="mt-6 rounded-2xl bg-white p-4">
						<div class="flex gap-3">
							<svg class="mt-0.5 size-5 shrink-0 text-brand-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3 4 7v5c0 5 3.4 8 8 9 4.6-1 8-4 8-9V7z"/></svg>
							<p class="text-xs leading-6 text-slate-600"><?php esc_html_e( 'Your download is protected and will never expose a public file URL.', 'welsglobal' ); ?></p>
						</div>
					</div>
				</aside>
			</div>
		</div>

		<div class="mt-8 flex flex-col items-center justify-between gap-5 rounded-3xl bg-brand-blue px-6 py-7 text-center text-white sm:flex-row sm:px-8 sm:text-left">
			<div>
				<h2 class="font-display text-xl font-bold"><?php esc_html_e( 'Need help with your order?', 'welsglobal' ); ?></h2>
				<p class="mt-1 text-xs leading-6 text-blue-100"><?php esc_html_e( 'Our team is ready to help with payment or delivery questions.', 'welsglobal' ); ?></p>
			</div>
			<a class="inline-flex min-h-11 shrink-0 items-center justify-center rounded-full bg-white px-6 text-sm font-bold text-brand-navy transition hover:bg-brand-gold" href="mailto:hello@welsglobal.com"><?php esc_html_e( 'Contact support', 'welsglobal' ); ?></a>
		</div>

		<div class="mt-10 text-center">
			<a class="inline-flex items-center gap-2 text-sm font-bold text-brand-blue hover:text-brand-navy" href="<?php echo esc_url( home_url( '/ebooks/' ) ); ?>">
				<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
				<?php esc_html_e( 'Continue exploring eBooks', 'welsglobal' ); ?>
			</a>
		</div>
	</div>
</section>

<?php
get_footer();
