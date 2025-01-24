<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! $notices ) {
    return;
}

?>
<section class="mb-4">
    <div class="alert alert-danger mb-0 pb-2 pt-2 rounded-0">
        <div class="align-items-center row">
            <div class="col-md-1"><span class="fs-1">❌</span>
            </div>
            <div class="col-md-11">
                <?php foreach ( $notices as $notice ) : ?>
                    <div <?php echo wc_get_notice_data_attr( $notice ); ?>>
                        <?php echo wc_kses_notice( $notice['notice'] ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>