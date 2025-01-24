<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $product;
?>
<div class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
    <?php if( $product->is_on_sale() ) : ?>
        <s class="me-2"><?php echo PG_WC_Helper::getPrice( $product, 'regular' ); ?></s>
    <?php endif; ?>
    <?php if( $product->is_on_sale() ) : ?>
        <span class="h6 text-danger"><?php echo PG_WC_Helper::getPrice( $product, 'sale' ); ?></span>
    <?php endif; ?>
    <?php if( !$product->is_on_sale() ) : ?>
        <span class="h6"><?php echo PG_WC_Helper::getPrice( $product, 'regular' ); ?></span>
    <?php endif; ?>
</div>