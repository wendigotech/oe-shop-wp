<?php
defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="row woocommerce-variation-add-to-cart">
    <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
    <label for="inputQty" class="col-form-label col-lg-3 col-md-4 col-sm-3 col-xl-2 text-dark">
        <?php _e( 'Quantity', 'oe_shop' ); ?>
    </label>
    <?php do_action( 'woocommerce_before_add_to_cart_quantity' );
        
        	woocommerce_quantity_input(
        		array(
        			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
        			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
        			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(),
        		)
        	);
        
    	do_action( 'woocommerce_after_add_to_cart_quantity' ); ?>
    <div class="col-md-12 mt-5">
        <button type="submit" class="btn btn-danger fw-bold pb-2 pe-5 ps-5 pt-2 rounded-0 single_add_to_cart_button" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>">
            <?php echo esc_html( $product->single_add_to_cart_text() ); ?>
        </button>
        <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
    </div>
    <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>"/>
    <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>"/>
    <input type="hidden" name="variation_id" class="variation_id" value="0"/>
</div>
