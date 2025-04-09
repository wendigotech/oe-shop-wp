<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-feature',
            'title' => __( 'Shop Feature', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-feature/shop-feature.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-feature/shop-feature.js',
            'attributes' => array(
                'image' => array(
                    'type' => array('object', 'null'),
                    'default' => array('id' => 0, 'url' => '', 'size' => '', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="3rem" height="3rem" class="mb-3 text-dark" version="1.1">
    <g>
        <path fill="none" d="M0 0h24v24H0z"/>
        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"/>
    </g>
</svg>', 'alt' => null)
                ),
                'title' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Free Shipping'
                ),
                'text' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit eiusmod'
                )
            ),
            'example' => array(
'image' => array('id' => 0, 'url' => '', 'size' => '', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="3rem" height="3rem" class="mb-3 text-dark" version="1.1">
    <g>
        <path fill="none" d="M0 0h24v24H0z"/>
        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"/>
    </g>
</svg>', 'alt' => null), 'title' => 'Free Shipping', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit eiusmod'
            ),
            'dynamic' => true,
            'version' => '1.0.467'
        ) );
