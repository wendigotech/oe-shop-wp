<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
    return;
}

$product_rating_count = $product->get_rating_count();
$product_review_count = $product->get_review_count();
$product_rating      = $product->get_average_rating();

if ( $product_rating_count > 0 ) : ?>     
<div class="mb-3">
    <span class="me-2 text-warning"><?php $product_rating_rounded = PG_WC_Helper::roundToHalfStar( $product_rating ); ?><?php for($product_rating_star = 1; $product_rating_star <= $product_rating_rounded; $product_rating_star++ ) : ?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1.125em" height="1.125em">
                <g>
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z"></path>
                </g>
            </svg><?php endfor; ?><?php if( $product_rating - $product_rating_rounded > 0.25) : ?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1.125em" height="1.125em">
                <g>
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M12 15.968l4.247 2.377-.949-4.773 3.573-3.305-4.833-.573L12 5.275v10.693zm0 2.292l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928L12 18.26z"></path>
                </g>
            </svg><?php $product_rating_rounded++; ?><?php endif; ?></span>
    <a href="#reviews" class="link-secondary woocommerce-review-link" rel="nofollow"><?php printf( _n( '%s customer review', '%s customer reviews', $product_review_count, 'woocommerce' ), '<span class="count">' . esc_html( $product_review_count ) . '</span>' ); ?></a>
</div>
<?php endif; ?>