<?php
/**
 * Block Name: carousel
 *
 * This is the template that displays carousel with block
 */

 // create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
 ?>

<div class=" block-carousel <?php echo $align_class; ?>">
    <div class="grid-container">
        <div class="block-header">
            <div class="block-title">
                <p><?php the_field('carousel_block_title'); ?></p>
            </div>
            <div class="block-link"><a
                    href="<?php echo get_field('carousel_block_url'); ?>"
                    target="_blank"><?php the_field('carousel_block_link'); ?> &rarr;</a></div>
        </div>

        <div class="slick-carousel">

        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 4,
            'orderby'        => 'menu_order',
            'order' => 'ASC'
            );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();
            $product = wc_get_product( get_the_ID() ); ?>

            <div class="single-slide">
                <a href="<?php the_permalink(); ?>"
                    class="<?php echo (!$product->is_in_stock()) ? 'sold-out' : 'in-stock';?>"><?php the_post_thumbnail('woocommerce_thumbnail'); ?></a>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p>
                    <?php echo ( $product->is_in_stock() ) ? $product->get_price_html() : '<span class="sold-out-color">Sold out</span>';?>
                </p>
            </div>

        <?php endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata(); ?>
        </div>
    </div>
</div>