<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( is_active_sidebar( 'shop' ) ) { ?>
<div class="col-md">
    <?php dynamic_sidebar( 'shop' ); ?>
</div>
<?php } ?>