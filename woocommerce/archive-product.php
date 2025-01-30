<?php get_header(); ?>

            <section class="pb-5 pg-lib-item text-secondary">
                <div class="container pb-5 pt-5">
                    <?php woocommerce_breadcrumb() ?>
                    <div class="gx-lg-5 gy-4 row">
                        <div class="col-lg-9 col-md-8">
                            <div class="align-items-center justify-content-between row">
                                <div class="col-auto">
                                    <h1 class="mb-4 text-dark"><?php woocommerce_page_title(); ?></h1>
                                </div>
                                <?php woocommerce_catalog_ordering() ?>
                                <?php woocommerce_result_count() ?>
                            </div>
                            <?php if ( woocommerce_product_loop() ) : ?>
                                <?php rewind_posts(); ?>
                                <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
                                    <div class="gy-4 mb-5 row row-cols-lg-4 row-cols-sm-2">
                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <?php global $product, $post; ?>
                                            <?php PG_Helper_v2::rememberShownPost(); ?>
                                            <div <?php wc_product_class('', $product ); ?> id="post-<?php the_ID(); ?>">
                                                <div class="position-relative"> <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="d-block mb-3"><?php wc_get_template( 'loop/product-image.php' ) ?></a>
                                                    <?php $terms = get_the_terms( get_the_ID(), 'product_cat' ) ?>
                                                    <?php if( !empty( $terms ) ) : ?>
                                                        <?php foreach( $terms as $term_i => $term ) : ?>
                                                            <a href="<?php echo esc_url( get_term_link( $term, 'product_cat' ) ) ?>" class="bg-info-subtle d-inline-block mb-2 p-1 rounded small text-decoration-none text-secondary"><?php echo $term->name; ?></a><?php if( $term_i < count( $terms ) - 1 ) echo ', '; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?><a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="text-dark text-decoration-none"><?php wc_get_template( 'loop/title.php' ) ?></a>
                                                    <?php woocommerce_template_loop_price() ?>
                                                    <?php PG_WC_Helper::withTemplateVariant( 'main', function() { woocommerce_template_loop_add_to_cart(); } ); ?>
                                                    <?php woocommerce_show_product_loop_sale_flash() ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            <?php else : ?>
                                <?php do_action( 'woocommerce_no_products_found' ); ?>
                            <?php endif; ?>
                            <?php woocommerce_pagination() ?>
                        </div>
                        <?php if ( is_active_sidebar( 'shop' ) ) : ?>
                            <?php woocommerce_get_sidebar() ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <?php $terms = get_terms( array(
                    'taxonomy' => 'product_cat',
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'parent' => get_queried_object_id(),
                    'hide_empty' => true
            ) ) ?>
            <?php if( !empty( $terms ) && !is_wp_error( $terms ) ) : ?>
                <section class="bg-light pb-5 pg-lib-item pt-5 text-secondary">
                    <div class="container pb-5 pt-5">
                        <h1 class="h2 mb-4 text-dark"><?php _e( 'Subcategories', 'oe_shop' ); ?></h1>
                        <div class="g-md-5 gy-4 justify-content-center row row-cols-lg-3 row-cols-sm-2">
                            <?php foreach( $terms as $term ) : ?>
                                <div> <a href="<?php echo esc_url( get_term_link( $term, 'product_cat' ) ); ?>" class="d-block link-dark position-relative"><?php ob_start(); woocommerce_subcategory_thumbnail( $term ); $image_html = ob_get_clean(); ?><?php if( $image_html ) : ?><?php 
$image_inspector = new PG_HTML_Inspector( $image_html ); 
$image_inspector->setAttributes( $image_inspector->findTokenIndex( 'img' ), array(
    'class' => 'img-fluid rounded w-100'
));
echo $image_inspector->getWhole(); 
?><?php endif; ?><div class="bg-white bottom-0 end-0 mb-3 me-3 ms-3 p-4 position-absolute rounded start-0">
                                            <h2 class="fw-bold h5 mb-0"><span><?php echo esc_html( $term->name ); ?></span> (<?php if( $term->count > 0 ) : ?><span><?php echo esc_html( $term->count ); ?></span><?php endif; ?>)</h2>
                                        </div></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

<?php get_footer(); ?>