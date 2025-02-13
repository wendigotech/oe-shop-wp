<?php
/* 
Use this file to add custom PHP code to your theme or plugin 
*/

function product_attribute_badge_shortcode($atts) {
    $product_id = get_the_ID();
    $product = wc_get_product($product_id);
    
    if ( ! $product ) {
        error_log( 'No product found for product ID: ' . $product_id );
    }
    
    $atts = shortcode_atts(array(
        'name'  => '',
        'class' => 'product-attribute-badge',
    ), $atts, 'product_attribute');

    $attribute_value = $product ? $product->get_attribute($atts['name']) : '';

    if ($attribute_value) {
        return "<span class='$atts[class]'>$attribute_value</span>";
    }
    
    return '';
}
add_shortcode('product_attribute', 'product_attribute_badge_shortcode');
?>