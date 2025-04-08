<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-sidebar-heading',
            'title' => __( 'Shop Sidebar Heading', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-sidebar-heading/shop-sidebar-heading.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-sidebar-heading/shop-sidebar-heading.js',
            'attributes' => array(
                'heading' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Search'
                )
            ),
            'example' => array(
'heading' => 'Search'
            ),
            'dynamic' => true,
            'version' => '1.0.457'
        ) );
