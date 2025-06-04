<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

?>
<p class="mb-4 fs-6 fs-md-5" id="carousel-desc-1"><?php echo $short_description; ?></p>