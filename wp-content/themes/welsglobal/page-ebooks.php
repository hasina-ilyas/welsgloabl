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
		'color'       => 'from-[#122b4d] via-[#145da0] to-[#071a33]',
		'accent'      => 'text-cyan-200',
		'number'      => '01',
		'featured'    => false,
	),
	array(
		'title'       => __( 'The Beginner’s Guide to Digital Marketing Strategies', 'welsglobal' ),
		'eyebrow'     => __( 'Digital Marketing', 'welsglobal' ),
		'description' => __( 'Turn digital complexity into a clear roadmap with practical frameworks for channels, campaigns, audiences, and sustainable results.', 'welsglobal' ),
		'price'       => '40',
		'color'       => 'from-[#7a4b14] via-[#d9a441] to-[#392307]',
		'accent'      => 'text-amber-100',
		'number'      => '02',
		'featured'    => true,
	),
	array(
		'title'       => __( 'Social Media Marketing Strategy', 'welsglobal' ),
		'eyebrow'     => __( 'Social Media', 'welsglobal' ),
		'description' => __( 'Stop posting without purpose. Design a repeatable social strategy that connects brand goals, compelling content, and audience action.', 'welsglobal' ),
		'price'       => '25',
		'color'       => 'from-[#4b1d4a] via-[#9b4f96] to-[#251023]',
		'accent'      => 'text-fuchsia-100',
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

		<div class="mt-10 flex gap-2 overflow-x-auto pb-2" role="group" aria-label="<?php esc_attr_e( 'Filter eBooks', 'welsglobal' ); ?>">
			<button class="shrink-0 rounded-full bg-brand-navy px-5 py-2.5 text-sm font-bold text-white" type="button" data-ebook-filter="all" aria-pressed="true"><?php esc_html_e( 'All guides', 'welsglobal' ); ?></button>
			<button class="shrink-0 rounded-full border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600" type="button" data-ebook-filter="Digital Marketing" aria-pressed="false"><?php esc_html_e( 'Digital marketing', 'welsglobal' ); ?></button>
			<button class="shrink-0 rounded-full border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600" type="button" data-ebook-filter="Content Strategy" aria-pressed="false"><?php esc_html_e( 'Content strategy', 'welsglobal' ); ?></button>
			<button class="shrink-0 rounded-full border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600" type="button" data-ebook-filter="Social Media" aria-pressed="false"><?php esc_html_e( 'Social media', 'welsglobal' ); ?></button>
		</div>

		<div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
			<?php foreach ( $ebooks as $ebook ) : ?>
				<article id="book-<?php echo esc_attr( $ebook['number'] ); ?>" class="group relative flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-card sm:p-6" data-ebook-card data-category="<?php echo esc_attr( $ebook['eyebrow'] ); ?>">
					<?php if ( $ebook['featured'] ) : ?>
						<span class="absolute right-4 top-4 z-10 rounded-full bg-brand-gold px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-wider text-brand-navy"><?php esc_html_e( 'Bestseller', 'welsglobal' ); ?></span>
					<?php endif; ?>
					<div class="relative overflow-hidden rounded-2xl bg-slate-100 px-10 py-9 sm:px-12">
						<div class="absolute left-5 top-5 size-16 rounded-full bg-white/50 blur-xl"></div>
						<div class="aspect-[3/4.15] bg-gradient-to-br <?php echo esc_attr( $ebook['color'] ); ?> p-5 text-white shadow-[10px_15px_25px_rgba(7,26,51,.28)] transition duration-300 group-hover:-rotate-1 group-hover:scale-[1.025]">
							<div class="flex h-full flex-col border border-white/25 p-4">
								<span class="text-[8px] font-extrabold uppercase tracking-[.25em] <?php echo esc_attr( $ebook['accent'] ); ?>">WELSGLOBAL</span>
								<div class="mt-auto">
									<span class="mb-2 block text-[9px] font-bold uppercase tracking-widest <?php echo esc_attr( $ebook['accent'] ); ?>"><?php echo esc_html( $ebook['eyebrow'] ); ?></span>
									<h3 class="font-display text-lg font-bold leading-tight sm:text-xl"><?php echo esc_html( $ebook['title'] ); ?></h3>
									<span class="mt-5 block text-[9px] uppercase tracking-[.18em] opacity-70">Executive Series · <?php echo esc_html( $ebook['number'] ); ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="flex flex-1 flex-col pt-6">
						<div class="flex items-center justify-between gap-4">
							<span class="text-xs font-bold uppercase tracking-[.16em] text-brand-blue"><?php echo esc_html( $ebook['eyebrow'] ); ?></span>
							<span class="inline-flex items-center gap-1 text-xs font-bold text-amber-500" aria-label="<?php esc_attr_e( 'Five star rating', 'welsglobal' ); ?>">★★★★★</span>
						</div>
						<h3 class="mt-3 font-display text-xl font-bold leading-snug text-brand-navy"><?php echo esc_html( $ebook['title'] ); ?></h3>
						<p class="mt-3 text-sm leading-6 text-slate-600"><?php echo esc_html( $ebook['description'] ); ?></p>
						<div class="mt-auto flex items-center justify-between gap-4 pt-6">
							<div>
								<span class="block text-xs text-slate-500"><?php esc_html_e( 'Digital eBook', 'welsglobal' ); ?></span>
								<span class="text-2xl font-bold text-brand-navy">$<?php echo esc_html( $ebook['price'] ); ?></span>
							</div>
							<a class="inline-flex min-h-11 items-center justify-center rounded-full bg-brand-navy px-5 py-3 text-sm font-bold text-white transition hover:bg-brand-blue" href="<?php echo esc_url( home_url( '/checkout/?ebook=' . $ebook['number'] ) ); ?>"><?php esc_html_e( 'Get the guide', 'welsglobal' ); ?></a>
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
