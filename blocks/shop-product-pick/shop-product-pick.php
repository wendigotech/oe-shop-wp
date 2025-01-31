<section <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array() ); else echo 'data-wp-block-props="true"'; ?>>
    <div class="container pb-4 pt-4">
        <div class="align-items-center row">
            <div class="col">
                <hr class="mb-0 mt-0"/>
            </div>
            <div class="col-auto">
                <h2 class="fw-normal lead mb-0 text-dark"><?php echo PG_Blocks_v3::getAttribute( $args, 'title' ) ?></h2>
            </div>
            <div class="col">
                <hr class="mb-0 mt-0"/>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
            $products_query_args = array(
                'post__in' => PG_Blocks_v3::getAttributeAsPostIds( $args, 'products' ),
                'post_type' => 'product',
                'post_status' => 'any',
                'posts_per_page' => -1,
                'ignore_sticky_posts' => true,
                'orderby' => 'post__in'
            )
        ?>
        <?php $products_query = new WP_Query( $products_query_args ); ?>
        <?php if ( $products_query->have_posts() ) : ?>
            <div class="justify-content-center row">
                <?php while ( $products_query->have_posts() ) : $products_query->the_post(); ?>
                    <?php global $product, $post; ?>
                    <?php PG_Helper_v2::rememberShownPost(); ?>
                    <div <?php wc_product_class( 'col-6 col-lg-3 col-md-4 pb-3 pt-3' , $product ); ?> id="post-<?php the_ID(); ?>">
                        <div class="position-relative"> <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="d-block mb-3"><?php wc_get_template( 'loop/product-image.php' ) ?></a>
                            <?php $terms = get_the_terms( get_the_ID(), 'product_cat' ) ?>
                            <?php if( !empty( $terms ) ) : ?>
                                <?php foreach( $terms as $term_i => $term ) : ?>
                                    <?php if( $term_i == 0 ) : ?>
                                        <a href="<?php echo esc_url( get_term_link( $term, 'product_cat' ) ) ?>" class="d-inline-block link-secondary mb-2 small text-decoration-none"><?php echo $term->name; ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="link-dark text-decoration-none"><?php wc_get_template( 'loop/title.php' ) ?></a>
                            <?php woocommerce_template_loop_price() ?>
                            <?php if ( PG_Blocks_v3::getAttribute( $args, 'show_ratings', false ) ) : ?>
                                <?php woocommerce_template_loop_rating() ?>
                            <?php endif; ?>
                            <?php PG_WC_Helper::withTemplateVariant( 'dark', function() { woocommerce_show_product_loop_sale_flash(); } ); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'oe_shop' ); ?></p>
        <?php endif; ?>
        <?php if ( PG_Blocks_v3::getLinkUrl( $args, 'button_link', false ) ) : ?>
            <div class="pb-4 pt-4 text-center"><a href="<?php echo (!empty($_GET['context']) && $_GET['context'] === 'edit') ? 'javascript:void()' : PG_Blocks_v3::getLinkUrl( $args, 'button_link' ) ?>" class="btn btn-dark pb-2 ps-4 pe-4 pt-2"><?php echo PG_Blocks_v3::getAttribute( $args, 'button_label' ) ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>