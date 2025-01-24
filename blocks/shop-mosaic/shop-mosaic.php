<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "container-fluid p-0", ) ); else echo 'data-wp-block-props="true"'; ?>>
    <div class="g-0 row">
        <?php if ( !PG_Blocks_v3::getImageSVG( $args, 'image_1', false) && PG_Blocks_v3::getImageUrl( $args, 'image_1', 'thumbnail' ) ) : ?>
            <img src="<?php echo PG_Blocks_v3::getImageUrl( $args, 'image_1', 'thumbnail' ) ?>" alt="<?php echo PG_Blocks_v3::getImageField( $args, 'image_1', 'alt', true); ?>" width="400" height="400" class="<?php echo (PG_Blocks_v3::getImageField( $args, 'image_1', 'id', true) ? ('wp-image-' . PG_Blocks_v3::getImageField( $args, 'image_1', 'id', true)) : '') ?> col-2 img-fluid"/>
        <?php endif; ?>
        <?php if ( PG_Blocks_v3::getImageSVG( $args, 'image_1', false) ) : ?>
            <?php echo PG_Blocks_v3::mergeInlineSVGAttributes( PG_Blocks_v3::getImageSVG( $args, 'image_1' ), array( 'class' => 'col-2 img-fluid' ) ) ?>
        <?php endif; ?>
        <?php if ( !PG_Blocks_v3::getImageSVG( $args, 'image_2', false) && PG_Blocks_v3::getImageUrl( $args, 'image_2', 'thumbnail' ) ) : ?>
            <img src="<?php echo PG_Blocks_v3::getImageUrl( $args, 'image_2', 'thumbnail' ) ?>" alt="<?php echo PG_Blocks_v3::getImageField( $args, 'image_2', 'alt', true); ?>" width="400" height="400" class="<?php echo (PG_Blocks_v3::getImageField( $args, 'image_2', 'id', true) ? ('wp-image-' . PG_Blocks_v3::getImageField( $args, 'image_2', 'id', true)) : '') ?> col-2 img-fluid"/>
        <?php endif; ?>
        <?php if ( PG_Blocks_v3::getImageSVG( $args, 'image_2', false) ) : ?>
            <?php echo PG_Blocks_v3::mergeInlineSVGAttributes( PG_Blocks_v3::getImageSVG( $args, 'image_2' ), array( 'class' => 'col-2 img-fluid' ) ) ?>
        <?php endif; ?>
        <?php if ( !PG_Blocks_v3::getImageSVG( $args, 'image_3', false) && PG_Blocks_v3::getImageUrl( $args, 'image_3', 'thumbnail' ) ) : ?>
            <img src="<?php echo PG_Blocks_v3::getImageUrl( $args, 'image_3', 'thumbnail' ) ?>" alt="<?php echo PG_Blocks_v3::getImageField( $args, 'image_3', 'alt', true); ?>" width="400" height="400" class="<?php echo (PG_Blocks_v3::getImageField( $args, 'image_3', 'id', true) ? ('wp-image-' . PG_Blocks_v3::getImageField( $args, 'image_3', 'id', true)) : '') ?> col-2 img-fluid"/>
        <?php endif; ?>
        <?php if ( PG_Blocks_v3::getImageSVG( $args, 'image_3', false) ) : ?>
            <?php echo PG_Blocks_v3::mergeInlineSVGAttributes( PG_Blocks_v3::getImageSVG( $args, 'image_3' ), array( 'class' => 'col-2 img-fluid' ) ) ?>
        <?php endif; ?>
        <?php if ( !PG_Blocks_v3::getImageSVG( $args, 'image_4', false) && PG_Blocks_v3::getImageUrl( $args, 'image_4', 'thumbnail' ) ) : ?>
            <img src="<?php echo PG_Blocks_v3::getImageUrl( $args, 'image_4', 'thumbnail' ) ?>" alt="<?php echo PG_Blocks_v3::getImageField( $args, 'image_4', 'alt', true); ?>" width="400" height="400" class="<?php echo (PG_Blocks_v3::getImageField( $args, 'image_4', 'id', true) ? ('wp-image-' . PG_Blocks_v3::getImageField( $args, 'image_4', 'id', true)) : '') ?> col-2 img-fluid"/>
        <?php endif; ?>
        <?php if ( PG_Blocks_v3::getImageSVG( $args, 'image_4', false) ) : ?>
            <?php echo PG_Blocks_v3::mergeInlineSVGAttributes( PG_Blocks_v3::getImageSVG( $args, 'image_4' ), array( 'class' => 'col-2 img-fluid' ) ) ?>
        <?php endif; ?>
        <?php if ( !PG_Blocks_v3::getImageSVG( $args, 'image_5', false) && PG_Blocks_v3::getImageUrl( $args, 'image_5', 'thumbnail' ) ) : ?>
            <img src="<?php echo PG_Blocks_v3::getImageUrl( $args, 'image_5', 'thumbnail' ) ?>" alt="<?php echo PG_Blocks_v3::getImageField( $args, 'image_5', 'alt', true); ?>" width="400" height="400" class="<?php echo (PG_Blocks_v3::getImageField( $args, 'image_5', 'id', true) ? ('wp-image-' . PG_Blocks_v3::getImageField( $args, 'image_5', 'id', true)) : '') ?> col-2 img-fluid"/>
        <?php endif; ?>
        <?php if ( PG_Blocks_v3::getImageSVG( $args, 'image_5', false) ) : ?>
            <?php echo PG_Blocks_v3::mergeInlineSVGAttributes( PG_Blocks_v3::getImageSVG( $args, 'image_5' ), array( 'class' => 'col-2 img-fluid' ) ) ?>
        <?php endif; ?>
        <?php if ( !PG_Blocks_v3::getImageSVG( $args, 'image_6', false) && PG_Blocks_v3::getImageUrl( $args, 'image_6', 'thumbnail' ) ) : ?>
            <img src="<?php echo PG_Blocks_v3::getImageUrl( $args, 'image_6', 'thumbnail' ) ?>" class="<?php echo (PG_Blocks_v3::getImageField( $args, 'image_6', 'id', true) ? ('wp-image-' . PG_Blocks_v3::getImageField( $args, 'image_6', 'id', true)) : '') ?> col-2 img-fluid" alt="<?php echo PG_Blocks_v3::getImageField( $args, 'image_6', 'alt', true); ?>" width="400" height="400"/>
        <?php endif; ?>
        <?php if ( PG_Blocks_v3::getImageSVG( $args, 'image_6', false) ) : ?>
            <?php echo PG_Blocks_v3::mergeInlineSVGAttributes( PG_Blocks_v3::getImageSVG( $args, 'image_6' ), array( 'class' => 'col-2 img-fluid' ) ) ?>
        <?php endif; ?>
    </div>
</div>