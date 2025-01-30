<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<form _lpchecked="1" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <div class="input-group">
        <input type="text" class="border-end-0 form-control p-2" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" aria-label="Enter Keyword" aria-describedby="keyword-input" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" value="<?php echo get_search_query(); ?>" name="s"/>
        <span class="bg-white input-group-text p-0" id="keyword-input"><button class="align-items-center btn d-inline-flex h-100" type="submit" id="button-addon1" aria-label="Search" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em">
                    <g>
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"></path>
                    </g>
                </svg>
            </button></span>
    </div>
    <input type="hidden" name="post_type" value="product"/>
</form>