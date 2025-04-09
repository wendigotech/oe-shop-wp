<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $post;

$current_product = $product;
$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

if ( $related_products ) : ?>
<section class="bg-light pb-5 pg-lib-item pt-5">
    <div class="container pb-5 pt-5">
        <div class="align-items-center gy-4 row">
            <div class="col">
                <?php if( $heading ) : ?>
                    <h3 class="fw-bold h2 text-dark"><?php echo esc_html( $heading ); ?></h3>
                <?php endif; ?>
            </div>
            <div class="col-lg-9">
                <div class="gy-4 row row-cols-md-3">
                    <?php foreach ( $related_products as $product ) : ?>
                        <div class="col-sm-6">
                            <?php $post_object = get_post( $product->get_id() ); ?>
                            <?php setup_postdata( $GLOBALS['post'] =& $post_object ); ?>
                            <div class="position-relative"> <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="d-block mb-3"><?php wc_get_template( 'loop/product-image.php' ) ?></a><a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="text-dark text-decoration-none"><?php wc_get_template( 'loop/title.php' ) ?></a>
                                <?php woocommerce_template_loop_price() ?>
                                <?php woocommerce_template_loop_add_to_cart() ?>
                                <?php woocommerce_show_product_loop_sale_flash() ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>        
<?php endif; 
wp_reset_postdata();
$product = $current_product;
?>