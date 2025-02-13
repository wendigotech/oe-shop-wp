<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="gy-2 justify-content-between row">
    <div class="col-10">
        <h2 class="fw-bold text-dark"><?php the_title(); ?></h2>
    </div>
    <div class="col">
        <?php echo do_shortcode('[product_brand]') ?>
    </div>
</div>