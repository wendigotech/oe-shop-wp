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
            $product_query_args = array(
                'post_type' => 'product',
                'posts_per_page' => PG_Blocks_v3::getAttributeForAction( $args, 'count' ),
                'paged' => get_query_var( 'paged' ) ?: 1,
                'order' => PG_Blocks_v3::getAttributeForAction( $args, 'direction' ),
                'orderby' => PG_Blocks_v3::getAttributeForAction( $args, 'orderby' ),
                'sale' => PG_Blocks_v3::getAttributeForAction( $args, 'sale' ),
                'tax_query' => array_filter( array(PG_Helper_v2::getTaxonomyQuery( 'product_cat', PG_Blocks_v3::getAttributeForAction( $args, 'cats' ) ), PG_Helper_v2::getTaxonomyQuery( 'product_tag', PG_Blocks_v3::getAttributeForAction( $args, 'tags' ) )) )
            )
        ?>
        <?php
            $product_query_args['meta_query'] = WC()->query->get_meta_query(); 
            if( isset( $product_query_args[ 'orderby' ] ) ) {
                switch( $product_query_args[ 'orderby' ] ) {
                    case 'price':
                        $product_query_args[ 'orderby' ] = 'meta_value_num';
                        $product_query_args[ 'meta_key' ] = '_price';
                        break;
                    case 'rating':
                        $product_query_args[ 'orderby' ] = 'meta_value_num';
                        $product_query_args[ 'meta_key' ] = '_wc_average_rating';
                        break;
                    case 'total_sales':
                        $product_query_args[ 'orderby' ] = 'meta_value_num';
                        $product_query_args[ 'meta_key' ] = 'total_sales';
                        break;
                    case 'review_count':
                        $product_query_args[ 'orderby' ] = 'meta_value_num';
                        $product_query_args[ 'meta_key' ] = '_wc_review_count';
                        break;
                }
            }
            if( isset( $product_query_args[ 'sale' ] ) ) {
                if( $product_query_args[ 'sale' ] === 'true' ) {
                    $product_query_args[ 'post__in' ] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
                } else if( $product_query_args[ 'sale' ] === 'false' ) {
                    $product_query_args[ 'post__not_in' ] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
                }
                unset( $product_query_args[ 'sale' ] );
            }
        ?>
        <?php $product_query = new WP_Query( $product_query_args ); ?>
        <?php if ( $product_query->have_posts() ) : ?>
            <div class="justify-content-center row">
                <?php while ( $product_query->have_posts() ) : $product_query->the_post(); ?>
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
                            <?php woocommerce_show_product_loop_sale_flash() ?>
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