<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $post;

$current_product = $product;
$heading = apply_filters( 'woocommerce_product_upsells_products_heading', __( 'You may also like&hellip;', 'woocommerce' ) );

if ( $upsells ) : ?>
<section>
    <div class="container pb-4 pt-4">
        <div class="align-items-center row">
            <div class="col">
                <hr class="mb-0 mt-0"/>
            </div>
            <div class="col-auto">
                <?php if( $heading ) : ?>
                    <h2 class="fw-normal lead mb-0 text-dark"><?php echo esc_html( $heading ); ?></h2>
                <?php endif; ?>
            </div>
            <div class="col">
                <hr class="mb-0 mt-0"/>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="justify-content-center row">
            <?php foreach ( $upsells as $product ) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-3 pt-3">
                    <?php $post_object = get_post( $product->get_id() ); ?>
                    <?php setup_postdata( $GLOBALS['post'] =& $post_object ); ?>
                    <div class="position-relative"> <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="d-block mb-3"><?php wc_get_template( 'loop/product-image.php' ) ?></a>
                        <?php $terms = get_the_terms( get_the_ID(), 'product_cat' ) ?>
                        <?php if( !empty( $terms ) ) : ?>
                            <?php foreach( $terms as $term_i => $term ) : ?>
                                <a href="<?php echo esc_url( get_term_link( $term, 'product_cat' ) ) ?>" class="d-inline-block link-secondary mb-2 small text-decoration-none"><?php echo $term->name; ?></a><?php if( $term_i < count( $terms ) - 1 ) echo ', '; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="link-dark text-decoration-none"><?php wc_get_template( 'loop/title.php' ) ?></a>
                        <?php woocommerce_template_loop_price() ?>
                        <?php woocommerce_template_loop_add_to_cart() ?>
                        <?php woocommerce_show_product_loop_sale_flash() ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="pb-4 pt-4 text-center">
</div>
    </div>
</section>        
<?php endif; 
wp_reset_postdata();
$product = $current_product;
?>