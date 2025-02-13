<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $product;

echo PG_Image::removeSizeAttributes( $product->get_image( 'woocommerce_thumbnail', array(
    'class' => 'img-fluid rounded'
), true ), null);