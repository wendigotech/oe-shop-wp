<?php
defined( 'ABSPATH' ) || exit;

if ( ! $product_attributes ) {
    return;
}
?>
<table class="table table-bordered">
    <tbody>
        <?php foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
            <tr class="woocommerce-product-attributes-item--<?php echo esc_attr( $product_attribute_key ); ?>">
                <td class="bg-light"><?php echo wp_kses_post( $product_attribute['label'] ); ?></td>
                <td><?php echo wp_kses_post( $product_attribute['value'] ); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>