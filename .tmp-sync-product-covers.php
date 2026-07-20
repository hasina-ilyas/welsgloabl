<?php
require __DIR__ . '/wp-load.php';

$covers = array(
	17 => 'content-marketing-plan-and-strategies-ebook.png',
	18 => 'digital-marketing-strategies-ebook.png',
	19 => 'social-media-marketing-strategy-ebook.png',
);

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

foreach ( $covers as $product_id => $filename ) {
	$source = get_template_directory() . '/assets/images/' . $filename;
	$tmp    = wp_tempnam( $filename );

	if ( ! $tmp || ! copy( $source, $tmp ) ) {
		fwrite( STDERR, "Could not stage {$filename}\n" );
		continue;
	}

	$file = array(
		'name'     => '2026-' . $filename,
		'tmp_name' => $tmp,
	);

	$attachment_id = media_handle_sideload( $file, $product_id, get_the_title( $product_id ) );

	if ( is_wp_error( $attachment_id ) ) {
		@unlink( $tmp );
		fwrite( STDERR, $attachment_id->get_error_message() . "\n" );
		continue;
	}

	set_post_thumbnail( $product_id, $attachment_id );
	echo "{$product_id}|{$attachment_id}|" . wp_get_attachment_url( $attachment_id ) . "\n";
}
