<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;


$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids(); ?>
<div class="woocommerce-product-gallery images">
	<figure class="woocommerce-product-gallery__wrapper desktop-thumbnails">
		<?php
		if ( $product->get_image_id() ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder ">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		do_action( 'woocommerce_product_thumbnails' );
		?>
	</figure>
	<div class="mobile-thumbnails">
		<?php the_title( '<h1 class="mobile_product_title entry-title">', '</h1>' ); ?>
		<div class="single-item ">
		<?php
			echo '<div class="single-slide">'. wp_get_attachment_image( $product->get_image_id(), 'full'  ) .'</div>'; // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
			if ( $attachment_ids && $product->get_image_id() ) {
				foreach ( $attachment_ids as $attachment_id ) {
					echo '<div class="single-slide">'. wp_get_attachment_image( $attachment_id, 'full'  ) .'</div>'; // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
				}
			} ?>
		</div>
	</div>
</div>
