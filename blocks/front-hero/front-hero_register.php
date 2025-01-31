<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/front-hero',
            'title' => __( 'Front Hero', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/front-hero/front-hero.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/front-hero/front-hero.js',
            'attributes' => array(
                'background' => array(
                    'type' => array('object', 'null'),
                    'default' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1523381294911-8d3cead13475?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwyMDkyMnwwfDF8c2VhcmNofDI0fHxmYXNoaW9uJTIwc2hvb3R8ZW58MHx8fA&ixlib=rb-1.2.1&q=80&w=1080', 'size' => '', 'svg' => '', 'alt' => null)
                ),
                'sup_heading' => array(
                    'type' => array('string', 'null'),
                    'default' => ''
                ),
                'heading' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Best Fabric Meets New Style'
                ),
                'tagline' => array(
                    'type' => array('string', 'null'),
                    'default' => ''
                ),
                'button_link' => array(
                    'type' => array('object', 'null'),
                    'default' => array('post_id' => 0, 'url' => '', 'post_type' => '', 'title' => '')
                ),
                'button_label' => array(
                    'type' => array('string', 'null'),
                    'default' => 'Shop Collection'
                )
            ),
            'example' => array(
'background' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1523381294911-8d3cead13475?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwyMDkyMnwwfDF8c2VhcmNofDI0fHxmYXNoaW9uJTIwc2hvb3R8ZW58MHx8fA&ixlib=rb-1.2.1&q=80&w=1080', 'size' => '', 'svg' => '', 'alt' => null), 'sup_heading' => 'New Collection', 'heading' => 'Best Fabric Meets New Style', 'tagline' => 'Our ability to feel, act and communicate is indistinguishable from magic.', 'button_link' => array('post_id' => 0, 'url' => '#', 'post_type' => '', 'title' => ''), 'button_label' => 'Shop Collection'
            ),
            'dynamic' => true,
            'version' => '1.0.99'
        ) );
