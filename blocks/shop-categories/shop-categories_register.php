<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-categories',
            'title' => __( 'Shop Categories', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-categories/shop-categories.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-categories/shop-categories.js',
            'attributes' => array(
                'parent' => array(
                    'type' => array('string', 'null'),
                    'default' => '0'
                ),
                'title' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Subcategories'
                )
            ),
            'example' => array(
'parent' => '', 'title' => 'Subcategories'
            ),
            'dynamic' => true,
            'version' => '1.0.100'
        ) );
