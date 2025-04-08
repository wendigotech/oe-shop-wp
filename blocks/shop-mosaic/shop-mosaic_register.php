<?php

        PG_Blocks_v3::register_block_type( array(
            'name' => 'oe-shop/shop-mosaic',
            'title' => __( 'Shop Mosaic', 'oe_shop' ),
            'category' => 'shop',
            'render_template' => 'blocks/shop-mosaic/shop-mosaic.php',
            'supports' => array(),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/shop-mosaic/shop-mosaic.js',
            'attributes' => array(
                'image_1' => array(
                    'type' => array('object', 'null'),
                    'default' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1524738258074-f8125c6a7588?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image')
                ),
                'image_2' => array(
                    'type' => array('object', 'null'),
                    'default' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1532453288672-3a27e9be9efd?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image')
                ),
                'image_3' => array(
                    'type' => array('object', 'null'),
                    'default' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1477044545293-98b9221de30a?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image')
                ),
                'image_4' => array(
                    'type' => array('object', 'null'),
                    'default' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1603217192634-61068e4d4bf9?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image')
                ),
                'image_5' => array(
                    'type' => array('object', 'null'),
                    'default' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1583001308455-e5d48b880c67?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image')
                ),
                'image_6' => array(
                    'type' => array('object', 'null'),
                    'default' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1579362094443-5d73793e4d3c?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image')
                )
            ),
            'example' => array(
'image_1' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1524738258074-f8125c6a7588?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image'), 'image_2' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1532453288672-3a27e9be9efd?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image'), 'image_3' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1477044545293-98b9221de30a?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image'), 'image_4' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1603217192634-61068e4d4bf9?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image'), 'image_5' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1583001308455-e5d48b880c67?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image'), 'image_6' => array('id' => 0, 'url' => 'https://images.unsplash.com/photo-1579362094443-5d73793e4d3c?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', 'size' => '', 'svg' => '', 'alt' => 'Instagram image')
            ),
            'dynamic' => true,
            'version' => '1.0.463'
        ) );
