<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $product;

echo PG_Image::removeSizeAttributes( $product->get_image( 'woocommerce_thumbnail', array(
    'sizes' => '(max-width: 100px) 52vw, (max-width: 480px) 90vw, (max-width: 768px) 70vw, (max-width: 1200px) 45vw, 630px',
    'class' => 'img-fluid',
    'style' => 'max-height: 320px;',
    'aria-labelledby' => 'carousel-title-1'
), true ), 'both');