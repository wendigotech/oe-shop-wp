<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-newsletter',
            'title' => __( 'Shop Newsletter', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-newsletter/shop-newsletter.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-newsletter/shop-newsletter.js',
            'attributes' => array(
                'title' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Join our newsletter and get 15% off'
                ),
                'subtitle' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Sign up for our newsletter to receive updates and exclusive offers'
                )
            ),
            'example' => array(
'title' => 'Join our newsletter and get 15% off', 'subtitle' => 'Sign up for our newsletter to receive updates and exclusive offers'
            ),
            'dynamic' => true,
            'version' => '1.0.82'
        ) );
