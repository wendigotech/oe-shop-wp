<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-product-list',
            'title' => __( 'Shop Product List', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-product-list/shop-product-list.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-product-list/shop-product-list.js',
            'attributes' => array(
                'title' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Popular this Week'
                ),
                'count' => array(
                    'type' => array('string', 'null'),
                    'default' => '4'
                ),
                'orderby' => array(
                    'type' => array('string', 'null'),
                    'default' => ''
                ),
                'direction' => array(
                    'type' => array('string', 'null'),
                    'default' => ''
                ),
                'sale' => array(
                    'type' => array('string', 'null'),
                    'default' => ''
                ),
                'tags' => array(
                    'type' => array('string', 'null'),
                    'default' => ''
                ),
                'cats' => array(
                    'type' => array('string', 'null'),
                    'default' => ''
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
'title' => 'Popular this Week', 'count' => '', 'orderby' => '', 'direction' => '', 'sale' => '', 'tags' => '', 'cats' => '', 'show_ratings' => '', 'button_link' => array('post_id' => 0, 'url' => '', 'post_type' => '', 'title' => ''), 'button_label' => 'View More'
            ),
            'dynamic' => true,
            'version' => '1.0.463'
        ) );
