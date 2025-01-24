<section <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => " pb-3 pt-3 text-center", ) ); else echo 'data-wp-block-props="true"'; ?>>
    <div class="container">
        <div class="bg-dark text-white">
            <div class="align-items-center row">
                <div class="col-lg-6 pb-5 pb-lg-0 pt-5 pt-lg-0">
                    <div class="ps-5 pe-5">
                        <?php if ( PG_Blocks_v3::getAttribute( $args, 'top_title', false ) ) : ?>
                            <h2 class="fw-normal h5 mb-1 text-white-50"><?php echo PG_Blocks_v3::getAttribute( $args, 'top_title' ) ?></h2>
                        <?php endif; ?>
                        <h3 class="fw-bold h1 mb-4"><?php echo PG_Blocks_v3::getAttribute( $args, 'text' ) ?></h3>
                        <?php if ( PG_Blocks_v3::getLinkUrl( $args, 'link', false ) ) : ?>
                            <a href="<?php echo (!empty($_GET['context']) && $_GET['context'] === 'edit') ? 'javascript:void()' : PG_Blocks_v3::getLinkUrl( $args, 'link' ) ?>" class="btn btn-light pb-2 ps-4 pe-4 pt-2"><?php echo PG_Blocks_v3::getAttribute( $args, 'label' ) ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if ( !PG_Blocks_v3::getImageSVG( $args, 'image', false) && PG_Blocks_v3::getImageUrl( $args, 'image', 'woocommerce_thumbnail' ) ) : ?>
                        <img src="<?php echo PG_Blocks_v3::getImageUrl( $args, 'image', 'woocommerce_thumbnail' ) ?>" class="<?php echo (PG_Blocks_v3::getImageField( $args, 'image', 'id', true) ? ('wp-image-' . PG_Blocks_v3::getImageField( $args, 'image', 'id', true)) : '') ?> d-block img-fluid w-100" alt="<?php echo PG_Blocks_v3::getImageField( $args, 'image', 'alt', true); ?>" width="480" height="360" style="max-height: 320px; object-fit: cover;"/>
                    <?php endif; ?>
                    <?php if ( PG_Blocks_v3::getImageSVG( $args, 'image', false) ) : ?>
                        <?php echo PG_Blocks_v3::mergeInlineSVGAttributes( PG_Blocks_v3::getImageSVG( $args, 'image' ), array( 'class' => 'd-block img-fluid w-100', 'style' => 'max-height: 320px; object-fit: cover;' ) ) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>