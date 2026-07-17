<?php
/**
 * Template Name: eBooks Store
 * Template Post Type: page
 *
 * @package WELSGLOBAL
 */

get_header();

$ebooks = array(
	array(
		'title'       => __( 'Content Marketing Plan & Strategies', 'welsglobal' ),
		'eyebrow'     => __( 'Content Strategy', 'welsglobal' ),
		'description' => __( 'Build a focused content engine that attracts the right audience, earns trust, and turns attention into measurable business growth.', 'welsglobal' ),
		'price'       => '15',
		'color'       => 'from-[#126aa8] via-[#0a477c] to-[#061b35]',
		'accent'      => 'text-[#76dcff]',
		'glow'        => 'bg-cyan-300',
		'mark'        => 'CM',
		'number'      => '01',
		'featured'    => false,
	),
	array(
		'title'       => __( 'The Beginner’s Guide to Digital Marketing Strategies', 'welsglobal' ),
		'eyebrow'     => __( 'Digital Marketing', 'welsglobal' ),
		'description' => __( 'Turn digital complexity into a clear roadmap with practical frameworks for channels, campaigns, audiences, and sustainable results.', 'welsglobal' ),
		'price'       => '40',
		'color'       => 'from-[#e7b54d] via-[#a96812] to-[#3b2107]',
		'accent'      => 'text-amber-100',
		'glow'        => 'bg-amber-300',
		'mark'        => 'DM',
		'number'      => '02',
		'featured'    => true,
	),
	array(
		'title'       => __( 'Social Media Marketing Strategy', 'welsglobal' ),
		'eyebrow'     => __( 'Social Media', 'welsglobal' ),
		'description' => __( 'Stop posting without purpose. Design a repeatable social strategy that connects brand goals, compelling content, and audience action.', 'welsglobal' ),
		'price'       => '25',
		'color'       => 'from-[#bc64b4] via-[#71366e] to-[#281128]',
		'accent'      => 'text-fuchsia-100',
		'glow'        => 'bg-fuchsia-300',
		'mark'        => 'SM',
		'number'      => '03',
		'featured'    => false,
	),
);
?>

<section class="relative isolate overflow-hidden bg-brand-navy text-white">
	<div class="absolute inset-0 -z-10 opacity-40" aria-hidden="true">
		<div class="absolute -right-24 -top-32 size-[30rem] rounded-full bg-brand-blue/40 blur-3xl"></div>
		<div class="absolute -bottom-48 left-1/4 size-[28rem] rounded-full bg-brand-gold/15 blur-3xl"></div>
		<div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,.035)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.035)_1px,transparent_1px)] bg-[size:54px_54px]"></div>
	</div>
	<div class="mx-auto grid min-w-0 max-w-7xl items-center gap-14 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1.08fr_.92fr] lg:px-8 lg:py-28">
		<div class="min-w-0">
			<div class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-4 py-2 text-xs font-bold uppercase tracking-[0.18em] text-brand-gold">
				<span class="size-1.5 rounded-full bg-brand-gold"></span>
				<?php esc_html_e( 'The Executive Strategy Series', 'welsglobal' ); ?>
			</div>
			<h1 class="max-w-3xl font-display text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl lg:text-7xl">
				<?php esc_html_e( 'Ideas are easy.', 'welsglobal' ); ?>
				<span class="block text-brand-gold"><?php esc_html_e( 'Execution wins.', 'welsglobal' ); ?></span>
			</h1>
			<p class="mt-6 max-w-2xl text-base leading-8 text-slate-300 sm:text-lg"><?php esc_html_e( 'Field-tested playbooks for founders, marketers, and business leaders ready to replace guesswork with clear, actionable strategy.', 'welsglobal' ); ?></p>
			<div class="mt-9 flex flex-col gap-3 sm:flex-row">
				<a class="inline-flex min-h-12 items-center justify-center gap-2 rounded-full bg-brand-gold px-7 py-3.5 text-sm font-bold text-brand-navy shadow-lg shadow-black/20 transition hover:-translate-y-0.5 hover:bg-amber-300" href="#collection">
					<?php esc_html_e( 'Explore the collection', 'welsglobal' ); ?>
					<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
				</a>
				<a class="inline-flex min-h-12 items-center justify-center gap-2 rounded-full border border-white/20 px-7 py-3.5 text-sm font-bold text-white transition hover:bg-white/10" href="#why-welsglobal"><?php esc_html_e( 'Why these guides work', 'welsglobal' ); ?></a>
			</div>
			<div class="mt-10 flex flex-wrap gap-x-7 gap-y-3 text-xs font-medium text-slate-400">
				<span class="inline-flex items-center gap-2"><svg class="size-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 4 4L19 6"/></svg><?php esc_html_e( 'Instant digital access', 'welsglobal' ); ?></span>
				<span class="inline-flex items-center gap-2"><svg class="size-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 4 4L19 6"/></svg><?php esc_html_e( 'Secure checkout', 'welsglobal' ); ?></span>
				<span class="inline-flex items-center gap-2"><svg class="size-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 4 4L19 6"/></svg><?php esc_html_e( 'Practical frameworks', 'welsglobal' ); ?></span>
			</div>
		</div>
		<div class="relative mx-auto min-w-0 w-full max-w-lg lg:mr-0">
			<div class="absolute -inset-4 rotate-3 rounded-[2.5rem] border border-white/10 bg-white/5"></div>
			<div class="relative overflow-hidden rounded-[2rem] border border-white/15 bg-white/10 p-5 shadow-2xl shadow-black/30 backdrop-blur sm:p-7">
				<div class="grid min-w-0 grid-cols-1 gap-5 sm:grid-cols-[minmax(0,.8fr)_minmax(0,1.2fr)]">
					<div class="aspect-[3/4.25] w-40 justify-self-center rounded-xl bg-gradient-to-br from-[#7a4b14] via-[#d9a441] to-[#392307] p-4 shadow-2xl sm:w-auto">
						<div class="flex h-full flex-col border border-white/25 p-3">
							<span class="text-[8px] font-bold uppercase tracking-[.25em] text-amber-100">WELSGLOBAL</span>
							<span class="mt-auto font-display text-lg font-bold leading-tight">Digital Marketing Strategies</span>
							<span class="mt-3 text-[9px] uppercase tracking-wider text-amber-100">Executive Series · 02</span>
						</div>
					</div>
					<div class="flex min-w-0 flex-col justify-center text-center sm:text-left">
						<span class="text-xs font-bold uppercase tracking-[.18em] text-brand-gold"><?php esc_html_e( 'Most popular', 'welsglobal' ); ?></span>
						<h2 class="mt-3 font-display text-xl font-bold leading-tight sm:text-2xl"><?php esc_html_e( 'A clearer path to digital growth.', 'welsglobal' ); ?></h2>
						<div class="mt-5 flex items-end gap-2"><span class="text-3xl font-bold">$40</span><span class="pb-1 text-xs text-slate-400">USD</span></div>
						<a class="mt-5 inline-flex w-fit items-center gap-2 self-center text-sm font-bold text-brand-gold hover:text-amber-300 sm:self-auto" href="#book-02"><?php esc_html_e( 'View guide', 'welsglobal' ); ?><span aria-hidden="true">→</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="collection" class="scroll-mt-20 bg-brand-cream py-16 sm:py-20 lg:py-24">
	<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
			<div>
				<p class="text-xs font-bold uppercase tracking-[.2em] text-brand-blue"><?php esc_html_e( 'Curated for action', 'welsglobal' ); ?></p>
				<h2 class="mt-3 max-w-2xl font-display text-3xl font-bold tracking-tight text-brand-navy sm:text-4xl lg:text-5xl"><?php esc_html_e( 'Choose your next growth playbook.', 'welsglobal' ); ?></h2>
			</div>
			<p class="max-w-md text-sm leading-7 text-slate-600"><?php esc_html_e( 'Each guide turns proven strategic thinking into practical steps you can apply to your business immediately.', 'welsglobal' ); ?></p>
		</div>

		<div class="mt-10 rounded-2xl border border-slate-200/80 bg-white/80 p-2 shadow-sm backdrop-blur" role="group" aria-label="<?php esc_attr_e( 'Filter eBooks', 'welsglobal' ); ?>">
			<div class="flex gap-2 overflow-x-auto">
				<button class="group/filter inline-flex shrink-0 items-center gap-2.5 rounded-xl bg-brand-navy px-4 py-3 text-sm font-bold text-white shadow-md shadow-brand-navy/15 transition" type="button" data-ebook-filter="all" aria-pressed="true">
					<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21.5z"/><path d="M4 5.5v16M8 7h8"/></svg>
					<?php esc_html_e( 'All guides', 'welsglobal' ); ?>
					<span class="rounded-md bg-white/15 px-1.5 py-0.5 text-[10px]" data-filter-count>3</span>
				</button>
				<button class="group/filter inline-flex shrink-0 items-center gap-2.5 rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-white hover:text-brand-navy" type="button" data-ebook-filter="Digital Marketing" aria-pressed="false">
					<span class="size-2 rounded-full bg-amber-400"></span>
					<?php esc_html_e( 'Digital marketing', 'welsglobal' ); ?>
					<span class="rounded-md bg-slate-100 px-1.5 py-0.5 text-[10px] text-slate-500" data-filter-count>1</span>
				</button>
				<button class="group/filter inline-flex shrink-0 items-center gap-2.5 rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-white hover:text-brand-navy" type="button" data-ebook-filter="Content Strategy" aria-pressed="false">
					<span class="size-2 rounded-full bg-cyan-400"></span>
					<?php esc_html_e( 'Content strategy', 'welsglobal' ); ?>
					<span class="rounded-md bg-slate-100 px-1.5 py-0.5 text-[10px] text-slate-500" data-filter-count>1</span>
				</button>
				<button class="group/filter inline-flex shrink-0 items-center gap-2.5 rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-white hover:text-brand-navy" type="button" data-ebook-filter="Social Media" aria-pressed="false">
					<span class="size-2 rounded-full bg-fuchsia-400"></span>
					<?php esc_html_e( 'Social media', 'welsglobal' ); ?>
					<span class="rounded-md bg-slate-100 px-1.5 py-0.5 text-[10px] text-slate-500" data-filter-count>1</span>
				</button>
			</div>
		</div>

		<div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
			<?php foreach ( $ebooks as $ebook ) : ?>
				<article id="book-<?php echo esc_attr( $ebook['number'] ); ?>" class="group relative flex flex-col overflow-hidden rounded-[1.75rem] border border-slate-200/80 bg-white p-4 shadow-sm transition duration-500 hover:-translate-y-1.5 hover:border-brand-gold/40 hover:shadow-card sm:p-5" data-ebook-card data-category="<?php echo esc_attr( $ebook['eyebrow'] ); ?>">
					<?php if ( $ebook['featured'] ) : ?>
						<span class="absolute right-7 top-7 z-20 inline-flex items-center gap-1.5 rounded-full bg-white px-3 py-1.5 text-[9px] font-extrabold uppercase tracking-wider text-brand-navy shadow-lg">
							<svg class="size-3 text-brand-gold" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="m12 2.5 2.8 5.67 6.26.91-4.53 4.42 1.07 6.24L12 16.8l-5.6 2.94 1.07-6.24-4.53-4.42 6.26-.91z"/></svg>
							<?php esc_html_e( 'Bestseller', 'welsglobal' ); ?>
						</span>
					<?php endif; ?>
					<div class="relative isolate overflow-hidden rounded-2xl bg-[#edf1f5] px-7 py-8 sm:px-10 sm:py-10">
						<div class="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_50%_20%,white,transparent_55%)]"></div>
						<div class="absolute bottom-5 left-1/2 -z-10 h-8 w-3/5 -translate-x-1/2 rounded-full bg-brand-navy/25 blur-xl"></div>
						<div class="relative mx-auto aspect-[3/4.2] max-w-[15rem] transition duration-500 group-hover:-translate-y-1 group-hover:rotate-[-1deg]">
							<div class="absolute -right-2 bottom-1 top-1 w-5 rounded-r-md bg-gradient-to-r from-slate-400 to-white shadow-lg"></div>
							<div class="absolute -bottom-2 left-2 right-0 h-4 skew-x-[38deg] rounded-b bg-slate-300"></div>
							<div class="relative h-full overflow-hidden rounded-l-sm rounded-r-md bg-gradient-to-br <?php echo esc_attr( $ebook['color'] ); ?> p-5 text-white shadow-[13px_17px_24px_rgba(7,26,51,.32)]">
								<div class="absolute -right-16 -top-16 size-44 rounded-full border-[28px] border-white/10"></div>
								<div class="absolute -bottom-10 -left-10 size-32 rotate-45 border-[18px] border-white/10"></div>
								<div class="absolute right-5 top-1/2 h-px w-20 rotate-[-35deg] bg-white/25"></div>
								<div class="relative flex h-full flex-col">
									<div class="flex items-center justify-between">
										<span class="text-[8px] font-extrabold uppercase tracking-[.25em] <?php echo esc_attr( $ebook['accent'] ); ?>">WELSGLOBAL</span>
										<span class="grid size-8 place-items-center rounded-full border border-white/25 bg-black/10 text-[9px] font-black"><?php echo esc_html( $ebook['mark'] ); ?></span>
									</div>
									<div class="mt-7 h-0.5 w-10 <?php echo esc_attr( $ebook['glow'] ); ?>"></div>
									<div class="mt-auto">
										<span class="mb-2 block text-[8px] font-bold uppercase tracking-[.2em] <?php echo esc_attr( $ebook['accent'] ); ?>"><?php echo esc_html( $ebook['eyebrow'] ); ?></span>
										<h3 class="max-w-[12rem] font-display text-xl font-bold leading-[1.08] sm:text-2xl"><?php echo esc_html( $ebook['title'] ); ?></h3>
										<div class="mt-5 flex items-center justify-between border-t border-white/20 pt-3">
											<span class="text-[8px] uppercase tracking-[.18em] opacity-75"><?php esc_html_e( 'Executive Series', 'welsglobal' ); ?></span>
											<span class="font-display text-lg font-bold opacity-50"><?php echo esc_html( $ebook['number'] ); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="flex flex-1 flex-col px-1 pt-5">
						<div class="flex items-center justify-between gap-4">
							<span class="text-xs font-bold uppercase tracking-[.16em] text-brand-blue"><?php echo esc_html( $ebook['eyebrow'] ); ?></span>
							<span class="inline-flex items-center gap-1 text-xs font-bold text-amber-500" aria-label="<?php esc_attr_e( 'Five star rating', 'welsglobal' ); ?>">★★★★★</span>
						</div>
						<h3 class="mt-3 font-display text-xl font-bold leading-snug text-brand-navy"><?php echo esc_html( $ebook['title'] ); ?></h3>
						<p class="mt-3 text-sm leading-6 text-slate-600"><?php echo esc_html( $ebook['description'] ); ?></p>
						<div class="mt-auto flex items-center justify-between gap-4 border-t border-slate-100 pt-5">
							<div>
								<span class="block text-xs text-slate-500"><?php esc_html_e( 'Digital eBook', 'welsglobal' ); ?></span>
								<span class="text-2xl font-bold text-brand-navy">$<?php echo esc_html( $ebook['price'] ); ?></span>
							</div>
							<a class="inline-flex min-h-11 items-center justify-center gap-2 rounded-full bg-brand-navy px-5 py-3 text-sm font-bold text-white transition hover:bg-brand-blue" href="<?php echo esc_url( home_url( '/ebook-details/?ebook=' . $ebook['number'] ) ); ?>">
								<?php esc_html_e( 'View details', 'welsglobal' ); ?>
								<svg class="size-3.5 transition group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
							</a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="why-welsglobal" class="scroll-mt-20 bg-white py-16 sm:py-20 lg:py-24">
	<div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
		<div>
			<p class="text-xs font-bold uppercase tracking-[.2em] text-brand-blue"><?php esc_html_e( 'Knowledge built to move', 'welsglobal' ); ?></p>
			<h2 class="mt-3 font-display text-3xl font-bold tracking-tight text-brand-navy sm:text-4xl lg:text-5xl"><?php esc_html_e( 'Less theory. More confident action.', 'welsglobal' ); ?></h2>
			<p class="mt-5 text-base leading-8 text-slate-600"><?php esc_html_e( 'These are not generic collections of tips. Every guide is shaped by years of strategy, brand, and growth execution across competitive markets.', 'welsglobal' ); ?></p>
			<div class="mt-8 rounded-2xl border border-brand-gold/30 bg-brand-cream p-6">
				<p class="font-display text-lg font-bold leading-7 text-brand-navy">“<?php esc_html_e( 'Strategy becomes valuable when your team can understand it, use it, and measure what happens next.', 'welsglobal' ); ?>”</p>
				<p class="mt-4 text-xs font-bold uppercase tracking-wider text-brand-blue"><?php esc_html_e( 'The WELSGLOBAL approach', 'welsglobal' ); ?></p>
			</div>
		</div>
		<div class="grid gap-4 sm:grid-cols-2">
			<?php
			$benefits = array(
				array( '01', __( 'Clear frameworks', 'welsglobal' ), __( 'Structured thinking that turns complex marketing decisions into a focused next step.', 'welsglobal' ) ),
				array( '02', __( 'Built from practice', 'welsglobal' ), __( 'Lessons informed by hands-on strategy and execution—not abstract theory alone.', 'welsglobal' ) ),
				array( '03', __( 'Made for busy leaders', 'welsglobal' ), __( 'Concise, approachable guidance designed to be understood and applied quickly.', 'welsglobal' ) ),
				array( '04', __( 'Lifetime reference', 'welsglobal' ), __( 'Return to the frameworks whenever you plan a campaign, channel, or growth move.', 'welsglobal' ) ),
			);
			foreach ( $benefits as $benefit ) :
				?>
				<div class="rounded-3xl border border-slate-200 p-6 transition hover:border-brand-gold/50 hover:shadow-card">
					<span class="grid size-10 place-items-center rounded-xl bg-brand-navy text-xs font-bold text-brand-gold"><?php echo esc_html( $benefit[0] ); ?></span>
					<h3 class="mt-5 font-display text-lg font-bold text-brand-navy"><?php echo esc_html( $benefit[1] ); ?></h3>
					<p class="mt-2 text-sm leading-6 text-slate-600"><?php echo esc_html( $benefit[2] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="bg-brand-blue py-14 text-white">
	<div class="mx-auto flex max-w-7xl flex-col gap-8 px-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
		<div>
			<p class="text-xs font-bold uppercase tracking-[.2em] text-blue-200"><?php esc_html_e( 'Start with clarity', 'welsglobal' ); ?></p>
			<h2 class="mt-2 max-w-2xl font-display text-3xl font-bold"><?php esc_html_e( 'Your next strategic breakthrough could be one framework away.', 'welsglobal' ); ?></h2>
		</div>
		<a class="inline-flex min-h-12 shrink-0 items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-bold text-brand-navy transition hover:bg-brand-gold" href="#collection"><?php esc_html_e( 'Browse all eBooks', 'welsglobal' ); ?></a>
	</div>
</section>

<section id="faq" class="scroll-mt-20 bg-white py-16 sm:py-20 lg:py-24">
	<div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
		<div class="text-center">
			<p class="text-xs font-bold uppercase tracking-[.2em] text-brand-blue"><?php esc_html_e( 'Before you buy', 'welsglobal' ); ?></p>
			<h2 class="mt-3 font-display text-3xl font-bold text-brand-navy sm:text-4xl"><?php esc_html_e( 'Frequently asked questions', 'welsglobal' ); ?></h2>
		</div>
		<div class="mt-10 divide-y divide-slate-200 border-y border-slate-200">
			<?php
			$faqs = array(
				array( __( 'How will I receive my eBook?', 'welsglobal' ), __( 'After your payment is confirmed, a secure download link will be sent to your email address.', 'welsglobal' ) ),
				array( __( 'What format are the guides supplied in?', 'welsglobal' ), __( 'The guides are delivered as digital PDF files so you can read them across desktop, tablet, and mobile devices.', 'welsglobal' ) ),
				array( __( 'Can I pay with cryptocurrency?', 'welsglobal' ), __( 'Yes. The completed checkout will support selected cryptocurrencies as well as credit and debit card payments.', 'welsglobal' ) ),
				array( __( 'Who are these eBooks designed for?', 'welsglobal' ), __( 'They are designed for founders, business owners, marketers, consultants, and teams who want practical strategic direction.', 'welsglobal' ) ),
			);
			foreach ( $faqs as $index => $faq ) :
				?>
				<details class="group py-5"<?php echo 0 === $index ? ' open' : ''; ?>>
					<summary class="flex cursor-pointer list-none items-center justify-between gap-5 font-display text-base font-bold text-brand-navy">
						<?php echo esc_html( $faq[0] ); ?>
						<span class="grid size-8 shrink-0 place-items-center rounded-full bg-slate-100 text-brand-blue transition group-open:rotate-45">+</span>
					</summary>
					<p class="max-w-2xl pt-3 text-sm leading-7 text-slate-600"><?php echo esc_html( $faq[1] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
