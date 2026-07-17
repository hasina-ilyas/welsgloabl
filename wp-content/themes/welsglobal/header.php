<?php
/**
 * Site header.
 *
 * @package WELSGLOBAL
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'overflow-x-hidden bg-white font-sans text-slate-950 antialiased' ); ?>>
<?php wp_body_open(); ?>
<header class="relative z-50 border-b border-white/10 bg-brand-navy text-white">
	<div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
		<a class="group inline-flex items-center gap-3" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'WELSGLOBAL home', 'welsglobal' ); ?>">
			<span class="grid size-10 place-items-center rounded-xl border border-brand-gold/40 bg-white/5 text-sm font-bold text-brand-gold transition group-hover:bg-white/10">WG</span>
			<span>
				<span class="block font-display text-lg font-bold tracking-[0.16em]">WELSGLOBAL</span>
				<span class="block text-[9px] uppercase tracking-[0.32em] text-slate-400">Strategy that moves</span>
			</span>
		</a>
		<nav class="hidden items-center gap-8 text-sm font-medium text-slate-300 lg:flex" aria-label="<?php esc_attr_e( 'Primary navigation', 'welsglobal' ); ?>">
			<a class="transition hover:text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'welsglobal' ); ?></a>
			<a class="text-white" href="<?php echo esc_url( home_url( '/ebooks/' ) ); ?>"><?php esc_html_e( 'eBooks', 'welsglobal' ); ?></a>
			<a class="transition hover:text-white" href="#why-welsglobal"><?php esc_html_e( 'Why WELSGLOBAL', 'welsglobal' ); ?></a>
			<a class="transition hover:text-white" href="#faq"><?php esc_html_e( 'FAQ', 'welsglobal' ); ?></a>
		</nav>
		<div class="hidden items-center gap-3 lg:flex">
			<a class="rounded-full border border-white/20 px-5 py-2.5 text-sm font-semibold transition hover:border-white/40 hover:bg-white/10" href="<?php echo esc_url( home_url( '/my-account/' ) ); ?>"><?php esc_html_e( 'My library', 'welsglobal' ); ?></a>
			<a class="relative grid size-11 place-items-center rounded-full border border-white/20 transition hover:border-white/40 hover:bg-white/10" href="<?php echo esc_url( home_url( '/cart/' ) ); ?>" aria-label="<?php esc_attr_e( 'View cart', 'welsglobal' ); ?>">
				<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M3 4h2l2.2 10.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6L20 8H7"/><circle cx="10" cy="20" r="1"/><circle cx="17" cy="20" r="1"/></svg>
				<span class="absolute -right-1 -top-1 grid size-5 place-items-center rounded-full bg-brand-gold text-[10px] font-black text-brand-navy" data-cart-count>0</span>
			</a>
			<a class="rounded-full bg-brand-gold px-5 py-2.5 text-sm font-bold text-brand-navy transition hover:bg-amber-300" href="#collection"><?php esc_html_e( 'Explore eBooks', 'welsglobal' ); ?></a>
		</div>
		<button class="grid size-11 place-items-center rounded-full border border-white/20 lg:hidden" type="button" data-menu-toggle aria-expanded="false" aria-controls="mobile-menu">
			<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'welsglobal' ); ?></span>
			<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
		</button>
	</div>
	<nav id="mobile-menu" class="hidden border-t border-white/10 px-4 py-5 lg:hidden" data-mobile-menu aria-label="<?php esc_attr_e( 'Mobile navigation', 'welsglobal' ); ?>">
		<div class="mx-auto flex max-w-7xl flex-col gap-1">
			<a class="rounded-xl px-4 py-3 text-sm font-medium hover:bg-white/10" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'welsglobal' ); ?></a>
			<a class="rounded-xl bg-white/10 px-4 py-3 text-sm font-medium" href="<?php echo esc_url( home_url( '/ebooks/' ) ); ?>"><?php esc_html_e( 'eBooks', 'welsglobal' ); ?></a>
			<a class="rounded-xl px-4 py-3 text-sm font-medium hover:bg-white/10" href="#why-welsglobal"><?php esc_html_e( 'Why WELSGLOBAL', 'welsglobal' ); ?></a>
			<a class="rounded-xl px-4 py-3 text-sm font-medium hover:bg-white/10" href="#faq"><?php esc_html_e( 'FAQ', 'welsglobal' ); ?></a>
		</div>
	</nav>
</header>
<main id="main">
