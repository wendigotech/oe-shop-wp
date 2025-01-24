<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $product;

echo PG_Image::removeSizeAttributes( $product->get_image( 'woocommerce_thumbnail', array(
    'sizes' => '(max-width: 320px) 88vw, (max-width: 640px) 246px, (max-width: 768px) 34vw, (max-width: 1024px) 216px, (max-width: 1280px) 261px, (max-width: 1440px) 306px, 306px',
    'class' => 'img-fluid w-100'
), true ), null);