<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "mb-4", ) ); else echo 'data-wp-block-props="true"'; ?>>
    <?php get_product_search_form() ?>
</div>