<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "col-lg-4 col-sm-6 pb-3 pt-3", ) ); else echo 'data-wp-block-props="true"'; ?>>
    <div>
        <?php if ( !PG_Blocks_v3::getImageUrl( $args, 'image', 'full', false ) && PG_Blocks_v3::getImageSVG( $args, 'image' ) ) : ?>
            <?php echo PG_Blocks_v3::mergeInlineSVGAttributes( PG_Blocks_v3::getImageSVG( $args, 'image' ), array( 'class' => 'mb-3 text-dark' ) ) ?>
        <?php endif; ?>
        <?php if ( PG_Blocks_v3::getImageUrl( $args, 'image', 'full', false ) ) : ?>
            <img src="<?php echo PG_Blocks_v3::getImageUrl( $args, 'image', 'full' ); ?>" class="mb-3 text-dark <?php echo (PG_Blocks_v3::getImageField( $args, 'image', 'id', true) ? ('wp-image-' . PG_Blocks_v3::getImageField( $args, 'image', 'id', true)) : '') ?>"/>
        <?php endif; ?>
        <h2 class="fw-bold h5 mb-3 text-dark"><?php echo PG_Blocks_v3::getAttribute( $args, 'title' ) ?></h2>
        <p class="mb-0"><?php echo PG_Blocks_v3::getAttribute( $args, 'text' ) ?></p>
    </div>
</div>