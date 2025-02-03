<?php
defined( 'ABSPATH' ) || exit;
?>

    <script type="text/template" id="tmpl-variation-template">
        <div class="alert alert-info">
            <p class="fw-bold"><?php _e( 'Your selected product:', 'oe_shop' ); ?></p>
            <p class="woocommerce-variation-description">{{{data.variation.variation_description}}}</p>
            <p class="woocommerce-variation-price">{{{data.variation.price_html}}}</p>
            <p class="woocommerce-variation-availability">{{{data.variation.availability_html}}}</p>
        </div>
    </script>
    <script type="text/template" id="tmpl-unavailable-variation-template">
        <div class="alert alert-danger">
            <p><?php _e( 'Description', 'oe_shop' ); ?></p>
        </div>
    </script>

