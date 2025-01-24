<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="col-md-4">
    <div class="mb-3">
        <form class="woocommerce-ordering" method="get">
            <select id="formInput4" class="form-select orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>" name="orderby">
                <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                    <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>>
                        <?php echo esc_html( $name ); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="paged" value="1"/>
            <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
        </form>
    </div>
</div>