<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-categories-select',
            'title' => __( 'Shop Categories Select', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-categories-select/shop-categories-select.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-categories-select/shop-categories-select.js',
            'attributes' => array(
                'list' => array(
                    'type' => array('string', 'null'),
                    'default' => '0'
                ),
                'title' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Selected categories'
                )
            ),
            'example' => array(
'list' => '', 'title' => 'Selected categories'
            ),
            'dynamic' => true,
            'version' => '1.0.448'
        ) );
