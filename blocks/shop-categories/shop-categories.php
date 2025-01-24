<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array() ); else echo 'data-wp-block-props="true"'; ?>>
    <?php $terms = get_terms( array(
            'taxonomy' => 'product_cat',
            'orderby' => 'name',
            'order' => 'ASC',
            'parent' => PG_Helper_v2::getTermIDFromSlug( PG_Blocks_v3::getAttributeForAction( $args, 'parent' ), 'product_cat' ),
            'hide_empty' => true
    ) ) ?>
    <section class="bg-light pb-5 pg-lib-item pt-5 text-secondary">
        <div class="container pb-5 pt-5">
            <h1 class="h2 mb-4 text-dark"><?php echo PG_Blocks_v3::getAttribute( $args, 'title' ) ?></h1>
            <?php if( !empty( $terms ) && !is_wp_error( $terms ) ) : ?>
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
            <?php endif; ?>
        </div>
    </section>
</div>