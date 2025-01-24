<section <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "bg-light mt-4 pb-5 pt-5 text-center", 'id' => "newsletter_mailer_id", ) ); else echo 'data-wp-block-props="true"'; ?>>
    <div class="container pb-4 pt-4">
        <div class="row">
            <div class="col-lg-8 ms-auto me-auto py-3">
                <h2 class="text-dark"><?php echo PG_Blocks_v3::getAttribute( $args, 'title' ) ?></h2>
                <p class="mb-5 text-secondary"><?php echo PG_Blocks_v3::getAttribute( $args, 'subtitle' ) ?></p>
                <div class="col-md-9 col-xl-8 ms-auto me-auto">
                    <?php $mailer = new PG_Simple_Form_Mailer(); ?>
                    <?php $mailer->process( array(
                            'form_id' => 'newsletter_mailer_id',
                            'send_to_email' => true
                    ) ); ?>
                    <?php if( !$mailer->processed || $mailer->error) : ?>
                        <form id="newsletter_mailer_id" action="<?php echo '#newsletter_mailer_id'; ?>" method="post" onsubmit="event.stopImmediatePropagation();event.stopPropagation();">
                            <div class="bg-white border input-group overflow-hidden p-1">
                                <input type="text" class="border-0 form-control pe-3 ps-3" placeholder="Enter email..." aria-label="Recipient's email" aria-describedby="newsletter-submit" name="newsletter_mailer_id_1" value="<?php echo ( isset( $_POST['newsletter_mailer_id_1'] ) ? $_POST['newsletter_mailer_id_1'] : '' ); ?>"/>
                                <button class="btn btn-dark pb-2 pe-4 ps-4 pt-2 rounded-0" type="submit" id="newsletter-submit">
                                    <?php _e( 'Sign Up', 'oe_shop' ); ?>
                                </button>
                            </div>
                            <input type="hidden" name="newsletter_mailer_id" value="1"/>
                        </form>
                    <?php endif; ?>
                    <?php if( $mailer->processed ) : ?>
                        <?php if( $mailer->error ) : ?>
                            <?php echo $mailer->message; ?>
                        <?php else : ?>
                            <div class="alert alert-success" style="display:block;">
                                <?php _e( 'Thank you for subscribing!', 'oe_shop' ); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>