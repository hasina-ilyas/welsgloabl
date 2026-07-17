<?php
/**
 * Default content template.
 *
 * @package WELSGLOBAL
 */

get_header();
?>
<div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
	<?php if ( have_posts() ) : ?>
		<div class="space-y-12">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'prose max-w-none' ); ?>>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		</div>
	<?php else : ?>
		<p><?php esc_html_e( 'No content was found.', 'welsglobal' ); ?></p>
	<?php endif; ?>
</div>
<?php
get_footer();
