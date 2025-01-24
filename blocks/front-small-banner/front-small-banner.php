<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "col-md col-sm-6 py-3", ) ); else echo 'data-wp-block-props="true"'; ?>>
    <div class="position-relative text-dark">
        <?php if ( !PG_Blocks_v3::getImageSVG( $args, 'image', false) && PG_Blocks_v3::getImageUrl( $args, 'image', 'woocommerce_thumbnail' ) ) : ?>
            <img src="<?php echo PG_Blocks_v3::getImageUrl( $args, 'image', 'woocommerce_thumbnail' ) ?>" class="<?php echo (PG_Blocks_v3::getImageField( $args, 'image', 'id', true) ? ('wp-image-' . PG_Blocks_v3::getImageField( $args, 'image', 'id', true)) : '') ?> img-fluid w-100" alt="<?php echo PG_Blocks_v3::getImageField( $args, 'image', 'alt', true); ?>" width="280" height="200"/>
        <?php endif; ?>
        <?php if ( PG_Blocks_v3::getImageSVG( $args, 'image', false) ) : ?>
            <?php echo PG_Blocks_v3::mergeInlineSVGAttributes( PG_Blocks_v3::getImageSVG( $args, 'image' ), array( 'class' => 'img-fluid w-100' ) ) ?>
        <?php endif; ?>
        <div class="bottom-0 end-0  pb-5 pe-4 position-absolute ps-4 start-0">
            <h2 class="h5 mb-3"><?php echo PG_Blocks_v3::getAttribute( $args, 'title' ) ?></h2><a href="<?php echo (!empty($_GET['context']) && $_GET['context'] === 'edit') ? 'javascript:void()' : PG_Blocks_v3::getLinkUrl( $args, 'link_url' ) ?>" class="link-secondary small stretched-link text-decoration-none"><?php echo PG_Blocks_v3::getAttribute( $args, 'link_label' ) ?></a>
        </div>
    </div>
</div>