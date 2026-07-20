<?php
/**
 * Template Name: eBook Details
 * Template Post Type: page
 *
 * @package WELSGLOBAL
 */

$catalog = array(
	'01' => array(
		'title'       => __( 'Content Marketing Plan & Strategies', 'welsglobal' ),
		'category'    => __( 'Digital Marketing', 'welsglobal' ),
		'price'       => 15,
		'image'       => WELSGLOBAL_THEME_URL . '/assets/images/content-marketing-plan-and-strategies-ebook.png',
		'color'       => 'from-[#126aa8] via-[#0a477c] to-[#061b35]',
		'accent'      => 'text-[#76dcff]',
		'mark'        => 'CM',
		'description' => __( 'A practical, step-by-step guide to creating high-impact content strategies that attract attention, nurture relationships, and convert audiences into loyal customers.', 'welsglobal' ),
		'long'        => __( 'Explore the future of content, audience psychology, effective formats, customer profiling, competitor analysis, the Seven Ps of Marketing, SEO, outreach, paid media, and social promotion. This guide provides the tools and tactical plans needed to turn content into a measurable growth engine.', 'welsglobal' ),
		'outcomes'    => array(
			__( 'Define clear content goals and meaningful performance indicators.', 'welsglobal' ),
			__( 'Build audience profiles that guide stronger content decisions.', 'welsglobal' ),
			__( 'Create an achievable editorial plan across the right channels.', 'welsglobal' ),
			__( 'Measure, improve, and scale content that supports growth.', 'welsglobal' ),
		),
	),
	'02' => array(
		'title'       => __( 'The Beginner’s Guide to Digital Marketing Strategies', 'welsglobal' ),
		'category'    => __( 'Digital Marketing', 'welsglobal' ),
		'price'       => 40,
		'image'       => WELSGLOBAL_THEME_URL . '/assets/images/digital-marketing-strategies-ebook.png',
		'color'       => 'from-[#e7b54d] via-[#a96812] to-[#3b2107]',
		'accent'      => 'text-amber-100',
		'mark'        => 'DM',
		'description' => __( 'A clear, practical foundation for navigating modern digital marketing and connecting online tactics to meaningful business goals.', 'welsglobal' ),
		'long'        => __( 'Move step by step from current trends and objective setting to opportunity research, brand building, advertising, SEO, social media, and paid promotion. Whether you are new to marketing or sharpening an existing approach, this guide helps you build smarter campaigns with measurable results.', 'welsglobal' ),
		'outcomes'    => array(
			__( 'Understand how core digital marketing channels work together.', 'welsglobal' ),
			__( 'Set realistic goals connected to business priorities.', 'welsglobal' ),
			__( 'Choose channels based on your audience and available resources.', 'welsglobal' ),
			__( 'Plan and evaluate campaigns using actionable metrics.', 'welsglobal' ),
		),
	),
	'03' => array(
		'title'       => __( 'Social Media Marketing Strategy', 'welsglobal' ),
		'category'    => __( 'Digital Marketing', 'welsglobal' ),
		'price'       => 25,
		'image'       => WELSGLOBAL_THEME_URL . '/assets/images/social-media-marketing-strategy-ebook.png',
		'color'       => 'from-[#bc64b4] via-[#71366e] to-[#281128]',
		'accent'      => 'text-fuchsia-100',
		'mark'        => 'SM',
		'description' => __( 'A clear, practical foundation for building smarter social media strategies that support brand discovery, community growth, ecommerce, and customer loyalty.', 'welsglobal' ),
		'long'        => __( 'Learn the core elements of effective social marketing, including platform ecosystems, audience behaviour, objective setting, content creation, creator partnerships, paid campaigns, community management, and performance measurement. A bonus budget-planning template helps forecast spend and track platform performance.', 'welsglobal' ),
		'outcomes'    => array(
			__( 'Select social platforms based on strategic fit.', 'welsglobal' ),
			__( 'Develop useful content pillars and a sustainable cadence.', 'welsglobal' ),
			__( 'Create a stronger connection between content and conversion.', 'welsglobal' ),
			__( 'Track the signals that reveal real social performance.', 'welsglobal' ),
		),
	),
);

$ebook_id = isset( $_GET['ebook'] ) ? sanitize_key( wp_unslash( $_GET['ebook'] ) ) : '02';
$ebook    = isset( $catalog[ $ebook_id ] ) ? $catalog[ $ebook_id ] : $catalog['02'];
$sku      = 'WG-EBOOK-' . $ebook_id;
$product_id = function_exists( 'wc_get_product_id_by_sku' ) ? wc_get_product_id_by_sku( $sku ) : 0;

get_header();
?>

<section class="bg-brand-cream">
	<div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">
		<nav class="flex flex-wrap items-center gap-2 text-xs font-medium text-slate-500" aria-label="<?php esc_attr_e( 'Breadcrumb', 'welsglobal' ); ?>">
			<a class="transition hover:text-brand-blue" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'welsglobal' ); ?></a>
			<span aria-hidden="true">/</span>
			<a class="transition hover:text-brand-blue" href="<?php echo esc_url( home_url( '/ebooks/' ) ); ?>"><?php esc_html_e( 'eBooks', 'welsglobal' ); ?></a>
			<span aria-hidden="true">/</span>
			<span class="text-brand-navy"><?php echo esc_html( $ebook['title'] ); ?></span>
		</nav>
	</div>
</section>

<section class="overflow-hidden bg-white py-12 sm:py-16 lg:py-20">
	<div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.88fr_1.12fr] lg:items-center lg:gap-20 lg:px-8">
		<div class="relative isolate rounded-[2rem] bg-[#edf1f5] px-8 py-12 sm:px-14 sm:py-16">
			<div class="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_50%_18%,white,transparent_58%)]"></div>
			<div class="absolute bottom-9 left-1/2 -z-10 h-10 w-1/2 -translate-x-1/2 rounded-full bg-brand-navy/25 blur-2xl"></div>
			<img class="relative mx-auto aspect-[3/4.2] max-w-[18rem] object-contain drop-shadow-2xl transition duration-500 hover:-translate-y-1 hover:rotate-[-1deg]" src="<?php echo esc_url( $ebook['image'] ); ?>" alt="<?php echo esc_attr( sprintf( __( '%s eBook cover', 'welsglobal' ), $ebook['title'] ) ); ?>">
		</div>

		<div>
			<div class="flex flex-wrap items-center gap-3">
				<span class="rounded-full bg-brand-blue/10 px-3 py-1.5 text-xs font-bold uppercase tracking-[.14em] text-brand-blue"><?php echo esc_html( $ebook['category'] ); ?></span>
				<span class="inline-flex items-center gap-1 text-sm font-bold text-amber-500"><span aria-label="<?php esc_attr_e( 'Five star rating', 'welsglobal' ); ?>">★★★★★</span><span class="ml-1 text-xs font-medium text-slate-500">(5.0)</span></span>
			</div>
			<h1 class="mt-5 max-w-2xl font-display text-4xl font-bold leading-tight tracking-tight text-brand-navy sm:text-5xl"><?php echo esc_html( $ebook['title'] ); ?></h1>
			<p class="mt-5 max-w-2xl text-base leading-8 text-slate-600"><?php echo esc_html( $ebook['description'] ); ?></p>

			<div class="mt-7 flex items-end gap-3 border-b border-slate-200 pb-7">
				<span class="font-display text-4xl font-bold text-brand-navy">$<?php echo esc_html( number_format_i18n( $ebook['price'], 0 ) ); ?></span>
				<span class="pb-1.5 text-sm font-medium text-slate-500">USD</span>
			</div>

			<form class="mt-7">
				<label class="mb-2 block text-xs font-bold uppercase tracking-[.16em] text-brand-navy" for="ebook-quantity"><?php esc_html_e( 'Quantity', 'welsglobal' ); ?></label>
				<div class="flex flex-col gap-3 sm:flex-row">
					<div class="inline-flex h-14 w-full items-center justify-between rounded-full border border-slate-300 bg-white px-2 sm:w-36" data-quantity-control>
						<button class="grid size-10 place-items-center rounded-full text-xl text-slate-500 transition hover:bg-slate-100 hover:text-brand-navy disabled:cursor-not-allowed disabled:opacity-30" type="button" data-quantity-minus aria-label="<?php esc_attr_e( 'Decrease quantity', 'welsglobal' ); ?>">−</button>
						<input id="ebook-quantity" class="w-10 border-0 bg-transparent p-0 text-center text-base font-bold text-brand-navy outline-none" type="number" name="quantity" value="1" min="1" max="10" inputmode="numeric" data-quantity-input>
						<button class="grid size-10 place-items-center rounded-full text-xl text-slate-500 transition hover:bg-slate-100 hover:text-brand-navy disabled:cursor-not-allowed disabled:opacity-30" type="button" data-quantity-plus aria-label="<?php esc_attr_e( 'Increase quantity', 'welsglobal' ); ?>">+</button>
					</div>
					<button class="inline-flex h-14 flex-1 items-center justify-center gap-3 rounded-full bg-brand-gold px-8 text-sm font-black text-brand-navy shadow-lg shadow-brand-gold/20 transition hover:-translate-y-0.5 hover:bg-amber-300 disabled:cursor-wait disabled:opacity-50" type="button" data-add-to-cart data-ebook-id="<?php echo esc_attr( $ebook_id ); ?>" data-ebook-title="<?php echo esc_attr( $ebook['title'] ); ?>" data-ebook-price="<?php echo esc_attr( $ebook['price'] ); ?>" <?php disabled( ! $product_id ); ?>>
						<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M3 4h2l2.2 10.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6L20 8H7"/><path d="M12 9v4M10 11h4"/></svg>
						<span data-add-to-cart-label><?php esc_html_e( 'Add to cart', 'welsglobal' ); ?></span>
					</button>
				</div>
			</form>
			<div class="mt-4 hidden items-center gap-2 rounded-xl border border-emerald-200 bg-emerald-100 px-4 py-3 text-sm font-semibold text-emerald-700" role="status" aria-live="polite" data-cart-message>
				<svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg>
				<?php esc_html_e( 'Added to your cart. You can continue browsing or open the cart when ready.', 'welsglobal' ); ?>
			</div>

			<div class="mt-7 grid gap-3 text-xs font-semibold text-slate-600 sm:grid-cols-3">
				<span class="inline-flex items-center gap-2 rounded-xl bg-slate-50 p-3"><svg class="size-4 text-emerald-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 4 4L19 6"/></svg><?php esc_html_e( 'Secure payment', 'welsglobal' ); ?></span>
				<span class="inline-flex items-center gap-2 rounded-xl bg-slate-50 p-3"><svg class="size-4 text-brand-blue" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3v12m0 0 4-4m-4 4-4-4M5 21h14"/></svg><?php esc_html_e( 'Instant delivery', 'welsglobal' ); ?></span>
				<span class="inline-flex items-center gap-2 rounded-xl bg-slate-50 p-3"><svg class="size-4 text-brand-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3 4 7v5c0 5 3.4 8 8 9 4.6-1 8-4 8-9V7z"/></svg><?php esc_html_e( 'Protected access', 'welsglobal' ); ?></span>
			</div>
		</div>
	</div>
</section>

<section class="border-y border-slate-200 bg-white py-14 sm:py-16">
	<div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 md:grid-cols-[auto_1fr] md:items-center lg:px-8">
		<div class="grid size-24 place-items-center rounded-full bg-brand-navy font-display text-2xl font-bold text-brand-gold shadow-lg sm:size-28">WM</div>
		<div>
			<p class="text-xs font-bold uppercase tracking-[.2em] text-brand-blue"><?php esc_html_e( 'About the author', 'welsglobal' ); ?></p>
			<h2 class="mt-2 font-display text-2xl font-bold text-brand-navy sm:text-3xl"><?php esc_html_e( 'Wella Mañabo', 'welsglobal' ); ?></h2>
			<p class="mt-3 max-w-3xl text-sm leading-7 text-slate-600"><?php esc_html_e( 'Wella Mañabo is a marketing strategist and business leader whose work focuses on practical frameworks, strategic growth, and helping brands compete with greater clarity across evolving markets.', 'welsglobal' ); ?></p>
		</div>
	</div>
</section>

<section class="bg-brand-cream py-16 sm:py-20">
	<div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[1.1fr_.9fr] lg:gap-20 lg:px-8">
		<div>
			<p class="text-xs font-bold uppercase tracking-[.2em] text-brand-blue"><?php esc_html_e( 'Inside the guide', 'welsglobal' ); ?></p>
			<h2 class="mt-3 font-display text-3xl font-bold text-brand-navy sm:text-4xl"><?php esc_html_e( 'Turn insight into your next move.', 'welsglobal' ); ?></h2>
			<p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( $ebook['long'] ); ?></p>
		</div>
		<div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
			<h2 class="font-display text-xl font-bold text-brand-navy"><?php esc_html_e( 'What you will learn', 'welsglobal' ); ?></h2>
			<ul class="mt-6 space-y-4">
				<?php foreach ( $ebook['outcomes'] as $outcome ) : ?>
					<li class="flex gap-3 text-sm leading-6 text-slate-600">
						<span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-emerald-100 text-emerald-700"><svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg></span>
						<?php echo esc_html( $outcome ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<section class="bg-white py-16 sm:py-20">
	<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
			<div>
				<p class="text-xs font-bold uppercase tracking-[.2em] text-brand-blue"><?php esc_html_e( 'Continue the series', 'welsglobal' ); ?></p>
				<h2 class="mt-2 font-display text-3xl font-bold text-brand-navy"><?php esc_html_e( 'Related strategy guides', 'welsglobal' ); ?></h2>
			</div>
			<a class="text-sm font-bold text-brand-blue hover:text-brand-navy" href="<?php echo esc_url( home_url( '/ebooks/' ) ); ?>"><?php esc_html_e( 'View all eBooks', 'welsglobal' ); ?> →</a>
		</div>
		<div class="mt-8 grid gap-5 md:grid-cols-2">
			<?php foreach ( $catalog as $related_id => $related ) : ?>
				<?php if ( $related_id === $ebook_id ) { continue; } ?>
				<a class="group flex items-center gap-5 rounded-3xl border border-slate-200 p-5 transition hover:-translate-y-1 hover:border-brand-gold/50 hover:shadow-card" href="<?php echo esc_url( home_url( '/ebook-details/?ebook=' . $related_id ) ); ?>">
					<img class="size-16 shrink-0 rounded-xl object-contain drop-shadow-md" src="<?php echo esc_url( $related['image'] ); ?>" alt="" loading="lazy">
					<span class="min-w-0 flex-1">
						<span class="text-[10px] font-bold uppercase tracking-[.16em] text-brand-blue"><?php echo esc_html( $related['category'] ); ?></span>
						<strong class="mt-1 block font-display text-lg leading-snug text-brand-navy group-hover:text-brand-blue"><?php echo esc_html( $related['title'] ); ?></strong>
					</span>
					<span class="font-display text-xl font-bold text-brand-navy">$<?php echo esc_html( number_format_i18n( $related['price'], 0 ) ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
