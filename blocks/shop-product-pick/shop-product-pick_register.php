<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-product-pick',
            'title' => __( 'Shop Product Pick', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-product-pick/shop-product-pick.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-product-pick/shop-product-pick.js',
            'attributes' => array(
                'title' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Hand picked products'
                ),
                'products' => array(
                    'type' => array('array', 'null'),
                    'default' => array()
                ),
                'show_ratings' => array(
                    'type' => array('string', 'null'),
                    'default' => ''
                ),
                'button_link' => array(
                    'type' => array('object', 'null'),
                    'default' => array('post_id' => 0, 'url' => '', 'post_type' => '', 'title' => '')
                ),
                'button_label' => array(
                    'type' => array('string', 'null'),
                    'default' => 'View More'
                )
            ),
            'example' => array(
'title' => 'Hand picked products', 'products' => array(), 'show_ratings' => '', 'button_link' => array('post_id' => 0, 'url' => '', 'post_type' => '', 'title' => ''), 'button_label' => 'View More'
            ),
            'dynamic' => true,
            'version' => '1.0.495'
        ) );
