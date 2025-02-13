<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/front-small-banners',
            'title' => __( 'Front Small Banners', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/front-small-banners/front-small-banners.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/front-small-banners/front-small-banners.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => true,
            'has_inner_blocks' => true,
            'version' => '1.0.246'
        ) );
