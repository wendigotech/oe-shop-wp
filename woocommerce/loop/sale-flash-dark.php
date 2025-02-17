<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;

if ( $product->is_on_sale() ) : ?>
<div class="bg-dark fw-bold lh-1 opacity-85 pb-2 pe-1 position-absolute ps-1 pt-2 rounded-end text-white" style="top: 50px; left: 0;">–<span><?php echo PG_WC_Helper::getSavedAmount( $product, 'amount', true ) ?></span>
</div>        
<?php endif; ?>
