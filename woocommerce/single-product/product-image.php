<?php
defined( 'ABSPATH' ) || exit;

global $product;    

$attachment_ids = $product->get_gallery_image_ids();        
$product_image_id =  $product->get_image_id();
$is_main_image = !empty($product_image_id);
    
array_unshift( $attachment_ids, $product_image_id ? $product_image_id : -1 );
?>

<section class="<?php echo $product->get_image_id() ? 'woocommerce-product-gallery--with-images' : 'woocommerce-product-gallery--without-images'; ?> images woocommerce-product-gallery">
    <div class="woocommerce-product-gallery__wrapper">
        <?php foreach ( $attachment_ids as $attachment_id ) : ?>
            <?php if( $attachment_id >= 0 ) : ?>
                <?php $attachment_thumb_src = wp_get_attachment_image_src( $attachment_id, 'woocommerce_gallery_thumbnail' ); ?>
                <?php $attachment_large_src = wp_get_attachment_image_src( $attachment_id, 'full' ); ?>
                <div class="woocommerce-product-gallery__image" data-thumb="<?= esc_url( $attachment_thumb_src[0] ); ?>" data-thumb-alt="<?= trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ); ?>"><a href="<?php echo esc_url($attachment_large_src[0]); ?>"><?php echo PG_Image::removeSizeAttributes( (new PG_HTML_Inspector(wc_get_gallery_image_html($attachment_id, $is_main_image)))->getHTML('img', null, null, array(
                                'class' => ''. ( $is_main_image ? 'wp-post-image' : '') .' d-block img-fluid w-100'
                        ) ), null) ?></a>
                </div>
            <?php else : ?>
                <div class="woocommerce-product-gallery__image woocommerce-product-gallery__image--placeholder">
                    <img src="<?php echo esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ); ?>" class="d-block img-fluid w-100" alt="<?php echo esc_html__( 'Awaiting product image', 'woocommerce' ); ?>" width="600" height="900"/>
                </div>
            <?php endif; ?>
            <?php $is_main_image = false; ?>
        <?php endforeach; ?>
    </div>
</section>
