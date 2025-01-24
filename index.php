<?php get_header(); ?>

            <div class="container mb-5 mt-5">
                <div class="mb-4 row">
                    <div class="col-md-9">
                        <?php woocommerce_breadcrumb() ?> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <?php rewind_posts(); ?>
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php PG_Helper_v2::rememberShownPost(); ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <h1 class="text-body"><?php the_title(); ?></h1>
                                    <?php if ( has_excerpt() ) : ?>
                                        <p class="lead"><?php echo get_the_excerpt(); ?></p>
                                    <?php endif; ?>
                                    <hr/>
                                    <div>
                                        <?php the_content(); ?>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'oe_shop' ); ?></p>
                        <?php endif; ?> 
                    </div>
                    <?php if ( is_active_sidebar( 'info' ) ) : ?>
                        <div class="col-md-3">
                            <?php dynamic_sidebar( 'info' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div>
</div>
            <div></div>
            <section></section>            

<?php get_footer(); ?>