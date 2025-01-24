<?php get_header(); ?>

<?php global $product; ?>
<?php do_action( 'woocommerce_before_single_product' ); ?>
<?php
    if ( post_password_required() ) {
        echo get_the_password_form();
        return;
    }
?>
<?php WC()->structured_data->generate_product_data(); ?>
<?php rewind_posts(); ?>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php PG_Helper_v2::rememberShownPost(); ?>
        <div <?php wc_product_class( ' mt-5 product text-secondary' , $product ); ?> id="post-<?php the_ID(); ?>">
            <div class=" container pb-5 pt-2">
                <div class="gx-lg-5 gy-4 mb-5 row">
                    <div class="col-md">
                        <div class="position-relative">
                            <?php woocommerce_show_product_images(); ?>
                            <?php woocommerce_show_product_sale_flash() ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <?php woocommerce_breadcrumb() ?>
                        <?php woocommerce_template_single_title() ?>
                        <?php woocommerce_template_single_rating() ?>
                        <?php woocommerce_template_single_excerpt() ?>
                        <?php woocommerce_template_single_price() ?>
                        <?php echo wc_get_stock_html( $product ) ?>
                        <?php woocommerce_template_single_add_to_cart() ?>
                        <div>
                            <?php woocommerce_template_single_meta(); ?>
                        </div>
                        <?php woocommerce_output_product_data_tabs(); ?>
                    </div>
                </div>
            </div>
            <?php woocommerce_upsell_display( 4 ) ?>
            <?php woocommerce_related_products( array(
                    'posts_per_page' => '3',
                    'orderby' => 'rand',
                    'order' => 'desc'
            ) ) ?>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.', 'oe_shop' ); ?></p>
<?php endif; ?>
<?php do_action( 'woocommerce_after_single_product' ); ?>

<?php get_footer(); ?>