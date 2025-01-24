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
<div class="row">
    <div class="col-lg-12">
        <hr/>
        <p class="mb-3"><?php echo $short_description; ?></p>
    </div>
</div>