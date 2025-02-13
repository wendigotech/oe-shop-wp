<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( is_active_sidebar( 'shop' ) ) { ?>
<div class="col-md-3">
    <?php dynamic_sidebar( 'shop' ); ?>
</div>
<?php } ?>