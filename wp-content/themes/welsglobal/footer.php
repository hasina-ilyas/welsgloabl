<?php
/**
 * Site footer.
 *
 * @package WELSGLOBAL
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main>
<footer class="bg-brand-navy text-white">
	<div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 md:grid-cols-2 lg:grid-cols-4 lg:px-8">
		<div class="lg:col-span-2">
			<div class="mb-5 inline-flex items-center gap-3">
				<img class="h-12 w-auto max-w-64 object-contain object-left" src="<?php echo esc_url( WELSGLOBAL_THEME_URL . '/assets/images/welsglobal-wordmark-white.svg' ); ?>" alt="<?php esc_attr_e( 'WELSGLOBAL LLC', 'welsglobal' ); ?>">
			</div>
			<p class="max-w-md text-sm leading-7 text-slate-400"><?php esc_html_e( 'Practical strategy guides built from real-world execution—created to help ambitious leaders turn insight into measurable growth.', 'welsglobal' ); ?></p>
		</div>
		<div>
			<h2 class="mb-4 text-sm font-bold uppercase tracking-wider text-white"><?php esc_html_e( 'Explore', 'welsglobal' ); ?></h2>
			<div class="flex flex-col gap-3 text-sm text-slate-400">
				<a class="hover:text-white" href="#collection"><?php esc_html_e( 'All eBooks', 'welsglobal' ); ?></a>
				<a class="hover:text-white" href="#why-welsglobal"><?php esc_html_e( 'Why WELSGLOBAL', 'welsglobal' ); ?></a>
				<a class="hover:text-white" href="#faq"><?php esc_html_e( 'Frequently asked', 'welsglobal' ); ?></a>
			</div>
		</div>
		<div>
			<h2 class="mb-4 text-sm font-bold uppercase tracking-wider text-white"><?php esc_html_e( 'Support', 'welsglobal' ); ?></h2>
			<div class="flex flex-col gap-3 text-sm text-slate-400">
				<a class="hover:text-white" href="mailto:hello@welsglobal.com">hello@welsglobal.com</a>
				<a class="hover:text-white" href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy policy', 'welsglobal' ); ?></a>
				<a class="hover:text-white" href="<?php echo esc_url( home_url( '/terms-conditions/' ) ); ?>"><?php esc_html_e( 'Terms & conditions', 'welsglobal' ); ?></a>
			</div>
		</div>
	</div>
	<div class="border-t border-white/10">
		<div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-6 text-xs text-slate-500 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
			<p>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'welsglobal' ); ?></p>
			<p><?php esc_html_e( 'Built for focused, sustainable growth.', 'welsglobal' ); ?></p>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
