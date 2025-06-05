<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-sidebar-search',
            'title' => __( 'Shop Sidebar Search', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-sidebar-search/shop-sidebar-search.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-sidebar-search/shop-sidebar-search.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => true,
            'version' => '1.0.501'
        ) );
