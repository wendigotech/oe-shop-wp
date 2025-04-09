<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-front-cta',
            'title' => __( 'Shop Front CTA', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-front-cta/shop-front-cta.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-front-cta/shop-front-cta.js',
            'attributes' => array(
                'top_title' => array(
                    'type' => array('string', 'null'),
                    'default' => ''
                ),
                'text' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Seasonal Sale Upto 70% off'
                ),
                'link' => array(
                    'type' => array('object', 'null'),
                    'default' => array('post_id' => 0, 'url' => '', 'post_type' => '', 'title' => '')
                ),
                'label' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Shop Collection'
                ),
                'image' => array(
                    'type' => array('object', 'null'),
                    'default' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1610970161790-57a21fc7d775?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=480&h=360&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'CTA image')
                )
            ),
            'example' => array(
'top_title' => 'Grab your collection today', 'text' => 'Seasonal Sale Upto 70% off', 'link' => array('post_id' => 0, 'url' => '#', 'post_type' => '', 'title' => ''), 'label' => 'Shop Collection', 'image' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1610970161790-57a21fc7d775?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=480&h=360&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'CTA image')
            ),
            'dynamic' => true,
            'version' => '1.0.467'
        ) );
