<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-features',
            'title' => __( 'Shop Features', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-features/shop-features.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-features/shop-features.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => true,
            'has_inner_blocks' => true,
            'version' => '1.0.336'
        ) );
