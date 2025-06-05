<?php get_header(); ?>

            <section>
                <div class="container pb-2 pt-2 py-5">
                    <div class="d-flex justify-content-start mb-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="carouselPauseBtn" aria-pressed="false" aria-label="Pause carousel" tabindex="0" aria-controls="productSlider" onclick="var carousel = bootstrap.Carousel.getInstance(document.getElementById('productSlider')); if (this.ariaPressed == 'false') { carousel.pause(); this.ariaPressed = 'true'; this.innerHTML = 'Slider abspielen'; } else { carousel.cycle(); this.ariaPressed = 'false'; this.innerHTML = 'Slider pausieren'; }" onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); this.click(); }">
                            <?php _e( 'Slider pausieren', 'oe_shop' ); ?>
                        </button>
                    </div>
                    <?php
                        $slider_query_args = array(
                            'post_type' => 'product',
                            'nopaging' => true,
                            'order' => 'ASC',
                            'orderby' => 'date',
                            'tax_query' => array_filter( array(PG_Helper_v2::getTaxonomyQuery( 'product_tag', 'beste' )) )
                        )
                    ?>
                    <?php
                        $slider_query_args['meta_query'] = WC()->query->get_meta_query(); 
                        if( isset( $slider_query_args[ 'orderby' ] ) ) {
                            switch( $slider_query_args[ 'orderby' ] ) {
                                case 'price':
                                    $slider_query_args[ 'orderby' ] = 'meta_value_num';
                                    $slider_query_args[ 'meta_key' ] = '_price';
                                    break;
                                case 'rating':
                                    $slider_query_args[ 'orderby' ] = 'meta_value_num';
                                    $slider_query_args[ 'meta_key' ] = '_wc_average_rating';
                                    break;
                                case 'total_sales':
                                    $slider_query_args[ 'orderby' ] = 'meta_value_num';
                                    $slider_query_args[ 'meta_key' ] = 'total_sales';
                                    break;
                                case 'review_count':
                                    $slider_query_args[ 'orderby' ] = 'meta_value_num';
                                    $slider_query_args[ 'meta_key' ] = '_wc_review_count';
                                    break;
                            }
                    }?>
                    <?php $slider_query = new WP_Query( $slider_query_args ); ?>
                    <div id="productSlider" class="carousel slide" data-bs-ride="carousel" aria-label="Featured Products" tabindex="0" aria-live="polite" aria-atomic="true" data-bs-interval="5000" data-bs-pause="hover" data-bs-touch="true" data-bs-keyboard="true">
                        <script>
        document.addEventListener('DOMContentLoaded', function() {
          var carousel = document.getElementById('productSlider');
          var pauseBtn = document.getElementById('carouselPauseBtn');
          var isPaused = false;

          pauseBtn.addEventListener('click', function() {
            var carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);
            if (!isPaused) {
              carouselInstance.pause();
              pauseBtn.setAttribute('aria-pressed', 'true');
              pauseBtn.innerText = 'Slider abspielen';
              pauseBtn.setAttribute('aria-label', 'Karussell-Autorotation abspielen');
              isPaused = true;
            } else {
              carouselInstance.cycle();
              pauseBtn.setAttribute('aria-pressed', 'false');
              pauseBtn.innerText = 'Slider pausieren';
              pauseBtn.setAttribute('aria-label', 'Karussell-Autorotation pausieren');
              isPaused = false;
            }
          });

          // Ensure the slider is cycling on load
          var carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);
          carouselInstance.cycle();
          isPaused = false;
          pauseBtn.setAttribute('aria-pressed', 'false');
          pauseBtn.innerText = 'Slider pausieren';
          pauseBtn.setAttribute('aria-label', 'Karussell-Autorotation pausieren');
        });
      </script>
                        <div class="position-relative">
                            <?php if ( $slider_query->have_posts() ) : ?>
                                <div class="carousel-inner">
                                    <?php $slider_query_item_number = 0; ?>
                                    <?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
                                        <?php global $product, $post; ?>
                                        <?php PG_Helper_v2::rememberShownPost(); ?>
                                        <div class="carousel-item<?php if( $slider_query_item_number == 0) echo ' active'; ?> <?php echo join( ' ', wc_get_product_class( '', $product ) ) ?>" role="group" aria-roledescription="slide" aria-label="Slide 1 of 3" aria-current="true" id="post-<?php the_ID(); ?>">
                                            <div class="row align-items-center">
                                                <div class="col-md-6 ps-5 text-center text-md-start">
                                                    <?php PG_WC_Helper::withTemplateVariant( 'slider', function() { wc_get_template( 'loop/title.php' ); } ); ?>
                                                    <?php PG_WC_Helper::withTemplateVariant( 'slider', function() { wc_get_template( 'loop/short-description.php' ); } ); ?><a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="btn btn-primary mb-3 px-4 text-white" aria-describedby="carousel-desc-1" aria-label="Shop Featured Product 1"><?php _e( 'Zum Produkt', 'oe_shop' ); ?></a>
                                                </div>
                                                <div class="col-md-6 d-flex justify-content-center">
                                                    <?php PG_WC_Helper::withTemplateVariant( 'slider', function() { wc_get_template( 'loop/product-image.php' ); } ); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $slider_query_item_number++; ?>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.', 'oe_shop' ); ?></p>
                            <?php endif; ?>
                            <ol class="carousel-indicators justify-content-center" aria-label="Slide indicators">
                                <li type="button" data-bs-target="#productSlider" data-bs-slide-to="0" class="active bg-primary" aria-current="true" aria-label="Go to slide 1" tabindex="0" aria-controls="productSlider"></li>
                                <li type="button" data-bs-target="#productSlider" data-bs-slide-to="1" aria-label="Go to slide 2" tabindex="0" aria-controls="productSlider" class="bg-primary"></li>
                                <li type="button" data-bs-target="#productSlider" data-bs-slide-to="2" aria-label="Go to slide 3" tabindex="0" aria-controls="productSlider" class="bg-primary"></li>
                            </ol>
                            <!-- Desktop controls -->
                            <!-- Mobile controls below carousel for accessibility -->
                            <div class="d-flex gap-3 justify-content-between me-5 ms-5 mt-4 pe-4 ps-4">
                                <button class="bg-primary btn btn-outline-secondary carousel-control-prev position-static px-3 py-2" type="button" data-bs-target="#productSlider" data-bs-slide="prev" aria-label="Vorheriges Produkt"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden"><?php _e( 'Vorheriges', 'oe_shop' ); ?></span>
                                </button>
                                <button class="bg-primary btn btn-outline-secondary carousel-control-next pb-2 pe-3 position-static ps-3 pt-2 px-3 py-2" type="button" data-bs-target="#productSlider" data-bs-slide="next" aria-label="Nächstes Produkt"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden"><?php _e( 'Nächstes', 'oe_shop' ); ?></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
                                <div class="mb-5 mt-auto row row-cols-lg-auto row-cols-sm-2">
                                    <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
                                        <div class="me-auto ms-0 row row-cols-auto row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xl-4 row-cols-xxl-4 w-auto" id="gridView">
                                            <?php while ( have_posts() ) : the_post(); ?>
                                                <?php global $product, $post; ?>
                                                <?php PG_Helper_v2::rememberShownPost(); ?>
                                                <section <?php wc_product_class( 'align-content-stretch align-items-stretch d-flex flex-column mb-4 text-break' , $product ); ?> id="post-<?php the_ID(); ?>">
                                                    <header>
                                                        <?php woocommerce_show_product_loop_sale_flash() ?>
                                                        <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="d-block mb-3"><?php wc_get_template( 'loop/product-image.php' ) ?><div class="position-relative">
                                                                <span class="badge bottom-0 end-0 fw-bold  position-absolute right-0 w-50"><?php echo do_shortcode('[display_pa_images name="pa_energy_3-plus-d,pa_energy_a-g,pa_energy_a-plus-f" class="your-class"]'); ?></span> 
                                                            </div></a>
                                                    </header>
                                                    <article class="flex-grow-1">
                                                        <?php $terms = get_the_terms( get_the_ID(), 'product_cat' ) ?>
                                                        <?php if( !empty( $terms ) ) : ?>
                                                            <?php foreach( $terms as $term_i => $term ) : ?>
                                                                <?php if( $term_i >= 0 && $term_i <= 2 ) : ?>
                                                                    <a href="<?php echo esc_url( get_term_link( $term, 'product_cat' ) ) ?>"><span class="badge bg-secondary fw-bolder mb-2 text-white"><?php echo $term->name; ?></span></a><?php if( $term_i < min( 2, count( $terms ) - 1 ) ) echo ','; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                        <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="text-dark text-decoration-none"><?php PG_WC_Helper::withTemplateVariant( 'product_list', function() { wc_get_template( 'loop/title.php' ); } ); ?></a>
                                                    </article>
                                                    <footer class="mt-auto">
                                                        <?php woocommerce_template_loop_price() ?>
                                                        <?php PG_WC_Helper::withTemplateVariant( 'main', function() { woocommerce_template_loop_add_to_cart(); } ); ?>
                                                    </footer>
                                                </section>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-auto col-md-12 col-sm-12 d-none table-responsive-md" id="tableView">
                                        <?php if ( woocommerce_product_loop() ) : ?>
                                            <?php rewind_posts(); ?>
                                            <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
                                                <table id="tableView" class="mw-100 table table-bordered table-sm table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-center py-2"><?php _e( 'Produktbild', 'oe_shop' ); ?></th>
                                                            <th scope="col" class="text-center py-2"><?php _e( 'Produktbeschreibung', 'oe_shop' ); ?></th>
                                                            <th scope="col" class="text-center py-2"><?php _e( 'Kategorien', 'oe_shop' ); ?></th>
                                                            <th scope="col" class="text-center py-2"><?php _e( 'Preis', 'oe_shop' ); ?></th>
                                                            <th scope="col" class="text-center py-2"><?php _e( 'Aktion', 'oe_shop' ); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ( have_posts() ) : the_post(); ?>
                                                            <?php global $product, $post; ?>
                                                            <?php PG_Helper_v2::rememberShownPost(); ?>
                                                            <tr <?php wc_product_class( 'border-bottom' , $product ); ?> id="post-<?php the_ID(); ?>">
                                                                <td class="text-center p-2"> <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="d-block mb-3 position-relative"> <div class="position-absolute right-0 top-0 translate-x-75 translate-y-25">
                                                                            <?php PG_WC_Helper::withTemplateVariant( 'table', function() { woocommerce_show_product_loop_sale_flash(); } ); ?>
                                                                        </div> <?php PG_WC_Helper::withTemplateVariant( 'table', function() { wc_get_template( 'loop/product-image.php' ); } ); ?><span class="badge bottom-0 end-0 fw-bold  position-absolute right-0"><?php echo do_shortcode('[display_pa_images name="pa_energy_3-plus-d,pa_energy_a-g,pa_energy_a-plus-f" class="your-class"]'); ?></span> </a></td>
                                                                <td class="text-center p-2"> <a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="text-dark text-decoration-none"> <?php wc_get_template( 'loop/title.php' ) ?> </a> </td>
                                                                <td class="text-center p-2"> <?php $terms = get_the_terms( get_the_ID(), 'product_cat' ) ?><?php if( !empty( $terms ) ) : ?><?php foreach( $terms as $term_i => $term ) : ?><?php if( $term_i >= 0 && $term_i <= 2 ) : ?><a href="<?php echo esc_url( get_term_link( $term, 'product_cat' ) ) ?>"><span class="badge bg-secondary fw-bolder mb-2 text-white"><?php echo $term->name; ?></span></a><?php if( $term_i < min( 2, count( $terms ) - 1 ) ) echo ','; ?><?php endif; ?><?php endforeach; ?><?php endif; ?> </td>
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
                        <h2 class="mb-4 text-dark"><?php _e( 'Unterkategorien', 'oe_shop' ); ?></h2>
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