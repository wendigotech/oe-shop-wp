<?php
defined( 'ABSPATH' ) || exit;

global $post, $product;

$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional information', 'woocommerce' ) );

?>

<div>
    <?php do_action( 'woocommerce_product_additional_information', $product ); ?>
</div>