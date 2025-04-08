<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="author" content=""/>
        <!-- Bootstrap core CSS -->
        <!-- Custom styles for this template -->
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>
    <body class="fw-light text-secondary <?php echo implode(' ', get_body_class()); ?>">
        <?php if( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>
        <nav class="bg-secondary navbar navbar-dark navbar-expand-lg py-lg-1 sticky-top"> 
            <div class="container"> <a class="fw-bold navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><?php if( get_theme_mod( 'custom_logo' ) ) : ?><img src="<?php echo PG_Image::getUrl( get_theme_mod( 'custom_logo', 'https://images.unsplash.com/photo-1616093098223-c32c8144d8ca?ixid=M3wyMDkyMnwwfDF8c2VhcmNofDE4fHxsb2dvfGVufDB8fHx8MTczNzQ5MDQ0MHww&ixlib=rb-4.0.3q=85&fm=jpg&crop=faces&cs=srgb&w=1200&h=800&fit=crop' ), 'full' ) ?>" alt="Site Logo" class="img-fluid" width="120"><?php endif; ?></a>
                <ul class="flex-row ms-auto navbar-nav order-lg-1 ps-2 pe-2"> 
                    <li class="nav-item"> <a class="link-light link-opacity-100-hover link-opacity-75 nav-link p-2 pb-3 pe-2 ps-2 pt-3" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View Cart' ); ?>"><?php if( WC()->cart->get_cart_contents_count() === 0 ) : ?><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1.25em" height="1.25em">
                                        <g>
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M7 8V6a5 5 0 1 1 10 0v2h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h3zm0 2H5v10h14V10h-2v2h-2v-2H9v2H7v-2zm2-2h6V6a3 3 0 0 0-6 0v2z"></path>
                                        </g>
                                    </svg> <span class="small"><?php _e( '(0)', 'oe_shop' ); ?></span></span><?php endif; ?><?php if( WC()->cart->get_cart_contents_count() > 0 ) : ?><span class="text-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1.25em" height="1.25em">
                                        <g>
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M7 8V6a5 5 0 1 1 10 0v2h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h3zm0 2H5v10h14V10h-2v2h-2v-2H9v2H7v-2zm2-2h6V6a3 3 0 0 0-6 0v2z"></path>
                                        </g>
                                    </svg> <span class="small text-success"><?php echo wp_kses_data( sprintf( _n( '(%d)', '(%d)', WC()->cart->get_cart_contents_count(), 'oe_shop' ), WC()->cart->get_cart_contents_count() ) ); ?></span></span><?php endif; ?> </a> 
                    </li>                     
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown-3" aria-controls="navbarNavDropdown-3" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> 
                </button>
                <div class="collapse navbar-collapse " id="navbarNavDropdown-3"> 
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <?php
                            PG_Smart_Walker_Nav_Menu::init();
                            PG_Smart_Walker_Nav_Menu::$options['template'] = '<li class="nav-item"><a class="link-light link-opacity-100-hover link-opacity-75 nav-link px-lg-3 py-lg-4 {CLASSES}" aria-current="page" id="{ID}" {ATTRS}>{TITLE}</a>
                                                    </li>';
                            PG_Smart_Walker_Nav_Menu::$options['current_class'] = 'active';
                            wp_nav_menu( array(
                                'container' => '',
                                'theme_location' => 'primary',
                                'items_wrap' => '<ul class="%2$s ms-auto navbar-nav" id="%1$s">%3$s</ul>',
                                'walker' => new PG_Smart_Walker_Nav_Menu()
                        ) ); ?>
                    <?php endif; ?>
                    <ul class="ms-auto navbar-nav"> 
                        <li class="nav-item"> <a class="nav-link pt-3" href="#" title="Search"><?php get_product_search_form() ?></a> 
                        </li>                         
                    </ul>                     
                </div>                 
            </div>             
        </nav>
        <main>