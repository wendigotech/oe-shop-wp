<?php get_header(); ?>

            <section class="pb-5 pg-lib-item text-secondary">
                <div class="container pb-5 pt-5">
                    <?php woocommerce_breadcrumb() ?>
                    <div class="gx-lg-5 gy-4 row">
                        <div class="col-lg-9 col-md-9">
                            <div class="align-items-center justify-content-between row">
                                <div class="col-auto">
                                    <h1 class="mb-4 text-dark"><?php woocommerce_page_title(); ?></h1>
                                </div>
                                <?php woocommerce_catalog_ordering() ?>
                                <?php woocommerce_result_count() ?>
                                <div class="col-lg-auto mb-4 view-switcher">
                                    <button class="btn btn-outline-dark" onclick="switchView('grid')" title="Rasteransicht">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z"/>
                                        </svg>
                                    </button>
                                    <button class="btn btn-outline-dark" onclick="switchView('table')" title="Tabellenansicht">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <?php if ( woocommerce_product_loop() ) : ?>
                                <?php rewind_posts(); ?>
                                <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
                                    <div class="gy-4 mb-5 mt-auto row row-cols-lg-auto row-cols-sm-2">
                                        <div class="row row-cols-4 w-auto" id="gridView">
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
                                        <div class="col-auto col-md-12 col-sm-12 d-none table-responsive-md" id="tableView">
                                            <?php if ( woocommerce_product_loop() ) : ?>
                                                <?php rewind_posts(); ?>
                                                <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
                                                    <table id="tableView" class="mw-100 table table-bordered table-sm table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="text-center py-2"><?php _e( 'Produktbild', 'oe_shop' ); ?></th>
                                                                <th scope="col" class="text-center py-2"><?php _e( 'Produktbeschreibung', 'oe_shop' ); ?></th>
                                                                <th scope="col" class="text-center py-2"><?php _e( 'Kategorie', 'oe_shop' ); ?></th>
                                                                <th scope="col" class="text-center py-2"><?php _e( 'Preis', 'oe_shop' ); ?></th>
                                                                <th scope="col" class="text-center py-2"><?php _e( 'Aktion', 'oe_shop' ); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while ( have_posts() ) : the_post(); ?>
                                                                <?php global $product, $post; ?>
                                                                <?php PG_Helper_v2::rememberShownPost(); ?>
                                                                <tr <?php wc_product_class( 'border-bottom' , $product ); ?> id="post-<?php the_ID(); ?>">
                                                                    <td class="text-center p-2"> <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="d-block mb-3 position-relative"> <div class="position-absolute top-0 right-0 translate-x-75 translate-y-25">
                                                                                <?php PG_WC_Helper::withTemplateVariant( 'table', function() { woocommerce_show_product_loop_sale_flash(); } ); ?>
                                                                            </div> <div class="bottom-0 end-0 position-absolute translate-x-75 translate-y-25">
                                                                                <span class="badge bg-success custom-badge product-attribute-badge rounded-pill text-white"><?php _e( 'A++', 'oe_shop' ); ?></span>
                                                                            </div> <?php PG_WC_Helper::withTemplateVariant( 'table', function() { wc_get_template( 'loop/product-image.php' ); } ); ?> </a></td>
                                                                    <td class="text-center p-2"> <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="text-dark text-decoration-none"> <?php wc_get_template( 'loop/title.php' ) ?> </a> </td>
                                                                    <td class="text-center p-2"> <?php $terms = get_the_terms( get_the_ID(), 'product_cat' ) ?><?php if( !empty( $terms ) ) : ?><?php foreach( $terms as $term_i => $term ) : ?><a href="<?php echo esc_url( get_term_link( $term, 'product_cat' ) ) ?>" class="bg-info-subtle d-inline-block mb-2 p-1 rounded small text-decoration-none text-secondary"><?php echo $term->name; ?></a><?php if( $term_i < count( $terms ) - 1 ) echo ', '; ?><?php endforeach; ?><?php endif; ?> </td>
                                                                    <td class="text-center p-2"> <?php woocommerce_template_loop_price() ?> </td>
                                                                    <td class="text-center p-2"> <?php PG_WC_Helper::withTemplateVariant( 'table', function() { woocommerce_template_loop_add_to_cart(); } ); ?> </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        </tbody>
                                                    </table>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <?php do_action( 'woocommerce_no_products_found' ); ?>
                                            <?php endif; ?>
                                        </div>                                         
                                    </div>
                                <?php endif; ?>
                            <?php else : ?>
                                <?php do_action( 'woocommerce_no_products_found' ); ?>
                            <?php endif; ?>
                            <script>
function switchView(view) {
    const buttons = document.querySelectorAll('.view-switcher button');
    buttons.forEach(button => button.classList.remove('active'));
    if (view === 'grid') {
        document.getElementById('gridView').classList.remove('d-none');
        document.getElementById('tableView').classList.add('d-none');
    } else {
        document.getElementById('tableView').classList.remove('d-none');
        document.getElementById('gridView').classList.add('d-none');
    }
    event.target.classList.add('active');
}
</script>
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