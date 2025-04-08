
        </main>
        <footer class="bg-dark pt-5 text-white"> 
            <div class="container"> 
                <div class="row"> 
                    <div class="col-xl-4 py-3"> <a href="<?php echo esc_url( home_url() ); ?>" class="d-inline-block fw-bold h2 link-light mb-4 text-decoration-none"><img src="<?php echo PG_Image::getUrl( get_theme_mod( 'shop_footer_footer_logo', 'https://images.unsplash.com/photo-1616093098223-c32c8144d8ca?ixid=M3wyMDkyMnwwfDF8c2VhcmNofDE4fHxsb2dvfGVufDB8fHx8MTczNzQ5MDQ0MHww&ixlib=rb-4.0.3q=85&fm=jpg&crop=faces&cs=srgb&w=1200&h=800&fit=crop' ), 'medium' ) ?>" alt="Footer Logo" class="img-fluid" width="120"></a> 
                        <?php if ( get_theme_mod( 'shop_footer_text' ) ) : ?>
                            <p class="mb-3"><?php echo get_theme_mod( 'shop_footer_text', __( 'Duis pharetra venenatis felis, ut tincidunt ipsum consequat nec. Fusce et porttitor libero, eu aliquam nisi. Nam finibus ullamcorper semper.', 'oe_shop' ) ); ?></p>
                        <?php endif; ?> 
                        <div class="mb-4"> <a href="<?php echo get_theme_mod( 'shop_footer_phone_url', '#' ); ?>" class="link-light text-decoration-none"><?php echo get_theme_mod( 'shop_footer_phone', __( '+1 234 567-890', 'oe_shop' ) ); ?></a> <br/> <a href="<?php echo get_theme_mod( 'shop_footer_email_url', '#' ); ?>" class="link-light text-decoration-none"><?php echo get_theme_mod( 'shop_footer_email', __( 'hello@company.com', 'oe_shop' ) ); ?></a> 
                        </div>                         
                    </div>                     
                    <div class="col-md-3 col-xl-2 py-3"> 
                        <h2 class="fw-normal h5 mb-4 text-uppercase text-white"><?php echo get_theme_mod( 'shop_footer_colum1_heading', __( 'Über uns', 'oe_shop' ) ); ?></h2> 
                        <?php if ( has_nav_menu( 'footer_1' ) ) : ?>
                            <?php
                                PG_Smart_Walker_Nav_Menu::init();
                                PG_Smart_Walker_Nav_Menu::$options['template'] = '<li class="mb-3 {CLASSES}" id="{ID}"> <a class="link-light link-opacity-100-hover link-opacity-75 text-decoration-none" {ATTRS}>{TITLE}</a> 
                                                            </li>';
                                wp_nav_menu( array(
                                    'container' => '',
                                    'theme_location' => 'footer_1',
                                    'items_wrap' => '<ul class="%2$s list-unstyled" id="%1$s">%3$s</ul>',
                                    'walker' => new PG_Smart_Walker_Nav_Menu()
                            ) ); ?>
                        <?php endif; ?> 
                    </div>                     
                    <div class="col-md-3 col-xl-2 py-3"> 
                        <h2 class="fw-normal h5 mb-4 text-uppercase text-white"><?php echo get_theme_mod( 'shop_footer_column2_heading', __( 'Service', 'oe_shop' ) ); ?></h2> 
                        <?php if ( has_nav_menu( 'footer_2' ) ) : ?>
                            <?php
                                PG_Smart_Walker_Nav_Menu::init();
                                PG_Smart_Walker_Nav_Menu::$options['template'] = '<li class="mb-3 {CLASSES}" id="{ID}"> <a class="link-light link-opacity-100-hover link-opacity-75 text-decoration-none" {ATTRS}>{TITLE}</a> 
                                                            </li>';
                                wp_nav_menu( array(
                                    'container' => '',
                                    'theme_location' => 'footer_2',
                                    'items_wrap' => '<ul class="%2$s list-unstyled" id="%1$s">%3$s</ul>',
                                    'walker' => new PG_Smart_Walker_Nav_Menu()
                            ) ); ?>
                        <?php endif; ?> 
                    </div>                     
                    <div class="col-md-6 col-xl-4 py-3"> 
                        <h2 class="fw-normal h5 mb-4 text-uppercase text-white"><?php echo get_theme_mod( 'shop_footer_column3_heading', __( 'Abonnieren', 'oe_shop' ) ); ?></h2> 
                        <p class="mb-3"><?php echo get_theme_mod( 'shop_footer_subscribe_text', __( 'Abonnieren Sie unseren Newsletter und erhalten Sie exklusive Updates direkt in Ihrem Posteingang.', 'oe_shop' ) ); ?></p> 
                        <?php $mailer = new PG_Simple_Form_Mailer(); ?>
                        <?php $mailer->process( array(
                                'form_id' => 'footer_subscribe_mailer_id'
                        ) ); ?>
                        <?php if( !$mailer->processed || $mailer->error) : ?>
                            <form class="mb-4" id="footer_subscribe_mailer_id" action="<?php echo '#footer_subscribe_mailer_id'; ?>" method="post" onsubmit="event.stopImmediatePropagation();event.stopPropagation();"> 
                                <div class="bg-white border input-group overflow-hidden p-1"> 
                                    <input type="text" class="border-0 form-control pe-3 ps-3" placeholder="E-Mail eingeben..." aria-label="E-Mail des Empfängers" aria-describedby="newsletter-submit2" name="footer_subscribe_mailer_id_1" value="<?php echo ( isset( $_POST['footer_subscribe_mailer_id_1'] ) ? $_POST['footer_subscribe_mailer_id_1'] : '' ); ?>"/> 
                                    <button class="btn btn-dark pb-2 ps-4 pe-4 pt-2 rounded-0" type="submit" id="newsletter-submit2" aria-label="absenden"> 
                                        <svg class="d-inline-block" height="16" width="16" version xmlns viewBox="0 0 24 24" xml:space fill="currentColor" stroke> 
                                            <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>                                             
                                        </svg>                                         
                                    </button>                                     
                                </div>                                 
                                <input type="hidden" name="footer_subscribe_mailer_id" value="1"/>
                            </form>
                        <?php endif; ?>
                        <?php if( $mailer->processed ) : ?>
                            <?php echo $mailer->message; ?>
                        <?php endif; ?> 
                        <h2 class="fw-normal h5 mb-3 text-uppercase text-white"><?php echo get_theme_mod( 'shop_footer_social_heading', __( 'Soziale Medien', 'oe_shop' ) ); ?></h2> 
                        <div class="d-inline-flex flex-wrap"> 
                            <?php if ( get_theme_mod( 'shop_footer_social_fb' ) ) : ?>
                                <a href="<?php echo get_theme_mod( 'shop_footer_social_fb', '#' ); ?>" class="link-light p-1" aria-label="facebook link"> <svg width="20" height="20" version xmlns viewBox="0 0 24 24" xml:space fill="currentColor" stroke> 
                                        <path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/> 
                                    </svg> </a>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'shop_footer_social_tw' ) ) : ?>
                                <a href="<?php echo get_theme_mod( 'shop_footer_social_tw', '#' ); ?>" class="link-light p-1" aria-label="twitter link"> <svg width="17" height="17" version xmlns viewBox="0 0 24 24" xml:space fill="currentColor" stroke="currentColor"> 
                                        <path d="M14.095 10.316L22.286 1h-1.94L13.23 9.088 7.551 1H1l8.59 12.231L1 23h1.94l7.51-8.543L16.45 23H23l-8.905-12.684zm-2.658 3.022l-.872-1.218L3.64 2.432h2.98l5.59 7.821.869 1.219 7.265 10.166h-2.982l-5.926-8.3z"/> 
                                    </svg> </a>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'shop_footer_social_ig' ) ) : ?>
                                <a href="<?php echo get_theme_mod( 'shop_footer_social_ig', '#' ); ?>" class="link-light p-1" aria-label="instagram link"> <svg width="20" height="20" version xmlns viewBox="0 0 24 24" xml:space fill="currentColor" stroke> 
                                        <path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-.25a1.25 1.25 0 0 0-2.5 0 1.25 1.25 0 0 0 2.5 0zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/> 
                                    </svg> </a>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'shop_footer_social_ln' ) ) : ?>
                                <a href="<?php echo get_theme_mod( 'shop_footer_social_ln', '#' ); ?>" class="link-light p-1" aria-label="linkedin link"> <svg width="20" height="20" version xmlns viewBox="0 0 24 24" xml:space fill="currentColor" stroke> 
                                        <path d="M6.94 5a2 2 0 1 1-4-.002 2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z"/> 
                                    </svg> </a>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'shop_footer_social_yt' ) ) : ?>
                                <a href="<?php echo get_theme_mod( 'shop_footer_social_yt', '#' ); ?>" class="link-light p-1" aria-label="youtube link"> <svg width="20" height="20" version xmlns viewBox="0 0 24 24" xml:space fill="currentColor" stroke> 
                                        <path d="M21.543 6.498C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5l6-3.5-6-3.5v7z"/> 
                                    </svg> </a>
                            <?php endif; ?> 
                        </div>                         
                    </div>                     
                </div>                 
                <div class="pb-3 pt-3 small"> 
                    <hr class="border-secondary mt-0"/> 
                    <div class="align-items-center row"> 
                        <div class="col-md pb-2 pt-2"> 
                            <p class="mb-0">&copy; <span><?php echo date( 'Y' ); ?></span> | <span><?php echo get_theme_mod( 'shop_footer_copyright', __( 'Alle Rechte vorbehalten - Firmenname', 'oe_shop' ) ); ?></span></p> 
                        </div>                         
                        <div class="col-md-auto pb-2 pt-2"><a href="<?php echo get_theme_mod( 'shop_footer_privacy_link', '#' ); ?>" class="link-light text-decoration-none"><?php _e( 'Datenschutzrichtlinie', 'oe_shop' ); ?></a> | <a href="<?php echo get_theme_mod( 'shop_footer_terms_link', '#' ); ?>" class="link-light text-decoration-none"><?php _e( 'Nutzungsbedingungen', 'oe_shop' ); ?></a> 
                        </div>                         
                    </div>                     
                </div>                 
            </div>             
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
