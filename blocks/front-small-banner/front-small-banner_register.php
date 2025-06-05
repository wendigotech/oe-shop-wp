<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/front-small-banner',
            'title' => __( 'Front Small Banner', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/front-small-banner/front-small-banner.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/front-small-banner/front-small-banner.js',
            'attributes' => array(
                'image' => array(
                    'type' => array('object', 'null'),
                    'default' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1467043237213-65f2da53396f?fp-z=3.75&fp-y=.5&fp-x=0&crop=focalpoint&fit=crop&w=280&h=200', 'size' => '', 'svg' => '', 'alt' => 'Product image')
                ),
                'title' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Mens Summer Collection'
                ),
                'link_label' => array(
                    'type' => array('string', 'null'),
                    'default' => 'View Collection'
                ),
                'link_url' => array(
                    'type' => array('object', 'null'),
                    'default' => array('post_id' => 0, 'url' => '#', 'post_type' => '', 'title' => '')
                )
            ),
            'example' => array(
'image' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1467043237213-65f2da53396f?fp-z=3.75&fp-y=.5&fp-x=0&crop=focalpoint&fit=crop&w=280&h=200', 'size' => '', 'svg' => '', 'alt' => 'Product image'), 'title' => 'Mens Summer Collection', 'link_label' => 'View Collection', 'link_url' => array('post_id' => 0, 'url' => '#', 'post_type' => '', 'title' => '')
            ),
            'dynamic' => true,
            'version' => '1.0.501'
        ) );
