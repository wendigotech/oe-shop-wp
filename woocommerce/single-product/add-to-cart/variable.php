<?php
defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
    return;
}
$cart_quantity_settings = PG_WC_Helper::getQuantityFieldSettings( $product );

$out_of_stock = empty( $available_variations ) && false !== $available_variations;                

if(!$out_of_stock) {
    foreach ($available_variations as $i => $v) {
        $price_html = new PG_HTML_Inspector($v['price_html']);
        $available_variations[$i]['price_html'] = $price_html->getInnerContent(null, 'price');
    }
}                    

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="mb-3 variations_form" method="post" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" enctype="multipart/form-data" data-product-id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; ?>">
    <?php foreach ( $attributes as $attribute_name => $options ) : ?>
        <div class="mb-4 row variations">
            <label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>" class="col-form-label col-lg-3 col-md-4 col-sm-3 col-xl-2 text-dark">
                <?php echo wc_attribute_label( $attribute_name ); ?>
            </label>
            <div class="col-sm-auto">
                <?php 
ob_start();
wc_dropdown_variation_attribute_options(
    array(
        'options'   => $options,
        'attribute' => $attribute_name,
        'product'   => $product,
    )
);
$dropdown_html = new PG_HTML_Inspector( ob_get_clean() );
$dropdown_html->setAttributes( $dropdown_html->findTokenIndex( 'select' ), array(
    'class' => 'form-select rounded-0'
));
echo $dropdown_html->getWhole(); 
 ?>
                <?php if( end( $attribute_keys ) === $attribute_name ) : ?>
                    <a href="#" class="d-inline-block link-primary mt-2 reset_variations"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1.25em" height="1.25em" fill="currentColor" class="me-2">
                            <path d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z"/>
                        </svg><span class="align-middle"><?php _e( 'Clear', 'oe_shop' ); ?></span></a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <?php do_action( 'woocommerce_after_variations_table' ); ?>
    <div class="mb-5 row">
        <div class="col-12 single_variation_wrap">
            <?php
                do_action( 'woocommerce_before_single_variation' );
                do_action( 'woocommerce_single_variation' );
                do_action( 'woocommerce_after_single_variation' );
             ?>
        </div>
    </div>
    <?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
