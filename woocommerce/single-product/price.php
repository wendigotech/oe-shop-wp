<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $product;
?>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> align-items-center d-flex fs-4 gap-3 mb-4"><?php if( $product->is_on_sale() ) : ?><span class="opacity-50 text-decoration-line-through text-muted"><?php echo PG_WC_Helper::getPrice( $product, 'regular' ); ?></span><?php endif; ?><?php if( $product->is_on_sale() ) : ?><span class="fs-2 fw-bolder text-danger"><?php echo PG_WC_Helper::getPrice( $product, 'sale' ); ?></span><?php endif; ?><?php if( !$product->is_on_sale() ) : ?><span class="fs-2 fw-bolder text-secondary-emphasis"><?php echo PG_WC_Helper::getPrice( $product, 'regular' ); ?></span><?php endif; ?></p>