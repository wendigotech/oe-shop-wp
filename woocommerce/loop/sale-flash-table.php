<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;

if ( $product->is_on_sale() ) : ?>
<span class="badge bg-danger rounded-pill">
                –<span><?php echo PG_WC_Helper::getSavedAmount( $product, 'percent', true ) ?></span> </span>        
<?php endif; ?>
