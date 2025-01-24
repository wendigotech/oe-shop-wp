<section <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "mb-5 pb-5 pt-5 text-center", ) ); else echo 'data-wp-block-props="true"'; ?>>
    <div class="container">
            <div class="justify-content-center row" <?php if(!empty($_GET['context']) && $_GET['context'] === 'edit') echo 'data-wp-inner-blocks'; ?>>
            <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo PG_Blocks_v3::getInnerContent( $args ); ?>
        </div>
    </div>
</section>