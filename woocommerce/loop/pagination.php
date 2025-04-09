<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}

PG_WCPagination::$args = apply_filters(
    'woocommerce_pagination_args',
    array( 
        'base'      => $base,
        'format'    => $format,
        'add_args'  => false,
        'current'   => max( 1, $current ),
        'total'     => $total,
        'end_size'  => 3,
        'mid_size'  => 3,
    )
);
?>
<nav>
    <ul class="justify-content-center  pagination">
        <li class="<?php if(!( PG_WCPagination::getCurrentPage() > 1 )) echo 'disabled'; ?> page-item"><a class="link-secondary page-link" <?php echo PG_WCPagination::getPreviousHrefAttribute(); ?>><?php _e( 'Previous', 'oe_shop' ); ?></a>
        </li>
        <?php $dots = false; ?>
        <?php for( $page_num = 1; $page_num <= PG_WCPagination::getMaxPages(); $page_num++) : ?>
            <?php if( $page_num == PG_WCPagination::getCurrentPage() ) : ?>
                <li class="active page-item"><a href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>" class="link-light page-link"><?php echo $page_num ?></a>
                </li>
                <?php $dots = false; ?>
            <?php elseif ( false || ( $page_num <= PG_WCPagination::$args['end_size'] || ( PG_WCPagination::getCurrentPage() && $page_num >= PG_WCPagination::getCurrentPage() - PG_WCPagination::$args['mid_size'] && $page_num <= PG_WCPagination::getCurrentPage() + PG_WCPagination::$args['mid_size'] ) || $page_num > PG_WCPagination::getMaxPages() - PG_WCPagination::$args['end_size'] ) ) : ?>
                <li class="<?php if( $page_num == PG_WCPagination::getCurrentPage() ) echo 'active'; ?> page-item"><a href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>" class="link-secondary page-link"><?php echo $page_num ?></a>
                </li>
                <?php $dots = false; ?>
            <?php else : ?>
                <?php if(!$dots) : ?>
                    <li class="border-bottom border-top page-item pe-3 ps-3">&hellip;
</li>
                    <?php $dots = true; ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endfor; ?>
        <li class="<?php if(!( PG_WCPagination::getCurrentPage() < PG_WCPagination::getMaxPages() )) echo 'disabled'; ?> page-item"><a class="link-secondary page-link" <?php echo PG_WCPagination::getNextHrefAttribute(); ?>><?php _e( 'Next', 'oe_shop' ); ?></a>
        </li>
    </ul>
</nav>