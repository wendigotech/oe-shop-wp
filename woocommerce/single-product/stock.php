<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="<?php echo esc_attr( $class ); ?> mb-3 stock">
    <?php echo wp_kses_post( $availability ); ?>
</div>