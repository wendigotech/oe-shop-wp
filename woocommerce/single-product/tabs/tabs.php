<?php
defined( 'ABSPATH' ) || exit;

$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

global $product;

if ( ! empty( $product_tabs ) ) : ?>

<div class="accordion accordion-flush border-bottom border-top mt-5 wc-tabs-wrapper woocommerce-tabs" id="accordionFlushExample">
    <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
        <div class="accordion-item">
            <h2 class="<?php echo esc_attr( $key ) . '_tab'; ?> accordion-header" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>"> <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tab-<?php echo esc_attr( $key ); ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                    <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                </button> </h2>
            <div id="tab-<?php echo esc_attr( $key ); ?>" class="accordion-collapse collapse show" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>" data-bs-parent="#accordionFlushExample" role="tabpanel">
                <div class="accordion-body">
                    <?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php do_action( 'woocommerce_product_after_tabs' ); ?>
</div>

<?php endif; ?>
