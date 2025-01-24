<section <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "background-cover bg-dark pb-5 position-relative pt-5 text-white", 'style' => ";".( PG_Blocks_v3::getImageUrl( $args, 'background', 'full' ) ? ( 'background-image: url('.PG_Blocks_v3::getImageUrl( $args, 'background', 'full' ).')' ) : '' )."", ) ); else echo 'data-wp-block-props="true"'; ?>>
    <div class="container pb-5 pt-5">
        <div class="pb-5 pt-5 row">
            <div class="col-lg-7 pb-5 pt-5">
                <?php if ( PG_Blocks_v3::getAttribute( $args, 'sup_heading', false ) ) : ?>
                    <p class="fw-normal h4 text-uppercase"><?php echo PG_Blocks_v3::getAttribute( $args, 'sup_heading' ) ?></p>
                <?php endif; ?>
                <h1 class="display-3 fw-bold mb-3"><?php echo PG_Blocks_v3::getAttribute( $args, 'heading' ) ?></h1>
                <?php if ( PG_Blocks_v3::getAttribute( $args, 'tagline', false ) ) : ?>
                    <p class="lead mb-4"><?php echo PG_Blocks_v3::getAttribute( $args, 'tagline' ) ?></p>
                <?php endif; ?>
                <?php if ( PG_Blocks_v3::getLinkUrl( $args, 'button_link', false ) ) : ?>
                    <a href="<?php echo (!empty($_GET['context']) && $_GET['context'] === 'edit') ? 'javascript:void()' : PG_Blocks_v3::getLinkUrl( $args, 'button_link' ) ?>" class="btn btn-light pb-2 ps-4 pe-4 pt-2"><?php echo PG_Blocks_v3::getAttribute( $args, 'button_label' ) ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>