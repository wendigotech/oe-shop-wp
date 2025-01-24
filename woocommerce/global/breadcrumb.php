<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$delimiter = '';

if ( ! empty( $breadcrumb ) ) : 
?>
<nav aria-label="breadcrumb" class="woocommerce-breadcrumb">
    <ol class="breadcrumb mb-1">
        <?php foreach ( $breadcrumb as $key => $crumb ) : ?>
            <li class="breadcrumb-item"><a href="<?php echo esc_url( $crumb[1] ); ?>" class="link-secondary text-decoration-none"><?php echo esc_html( $crumb[0] ); ?></a>
            </li>
            <?php if ( sizeof( $breadcrumb ) !== $key + 1 ) { echo $delimiter; } ?>
        <?php endforeach; ?>
    </ol>
</nav>
<?php endif; ?>