<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;

$classes = isset( $args['class'] ) ? $args['class'] : '';
$classes = preg_replace('/(^|\s)button($|\s)/m', ' ', $classes );

ob_start();
?>
<a type="submit" class="<?php echo esc_attr( $classes ); ?> btn btn-outline-danger btn-sm float-end fw-bold mt-3 pb-2 pt-2 rounded-0" href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" data-quantity="<?php echo esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ); ?>" <?php echo isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : ''; ?>><?php echo esc_html( $product->add_to_cart_text() ); ?></a>
<?php
echo apply_filters( 'woocommerce_loop_add_to_cart_link', ob_get_clean(), $product, $args );
