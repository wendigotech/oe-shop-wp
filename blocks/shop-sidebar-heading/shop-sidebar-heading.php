<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "mb-4", ) ); else echo 'data-wp-block-props="true"'; ?>>
    <h2 class="h5 text-dark"><?php echo PG_Blocks_v3::getAttribute( $args, 'heading' ) ?></h2>
    <hr class="mb-4"/>
</div>