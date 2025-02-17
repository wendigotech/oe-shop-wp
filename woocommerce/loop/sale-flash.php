<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;

if ( $product->is_on_sale() ) : ?>
<div class="bg-danger fw-bold lh-1 ms-1 mt-1 opacity-85 pb-1 pe-2 position-absolute ps-2 pt-1 rounded-pill text-white top-0" style="top: 50px; left: 0;">&ndash;<span><?php echo PG_WC_Helper::getSavedAmount( $product, 'percent', true ) ?></span> 
</div>        
<?php endif; ?>
