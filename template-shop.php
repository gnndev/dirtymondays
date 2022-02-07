<?php 
/*
Template Name: dm shop
*/

get_header(); ?>



<div class="page-content custom-shop">
    <?php if (get_field('cover', 'option')): ?>
    <div class="products-hero">
        <img class="show-for-medium" src="<?php echo get_field('cover', 'option') ; ?>">
        <img class="show-for-small-only" src="<?php echo get_field('cover_mob', 'option') ;?>">
    </div>
    <?php else: ?>
    <div class="products-header"></div>
    <?php endif; ?>
    <div class="content" style="padding-top:0">
        <div class="products-bar">
            <h2>Shop</h4>
                <div>
                    <div class="products-filters">

                        <p>FILTER</p>

                        <div class="ui-group">
                            <select class="filter-select" value-group="categories">
                                <option value="">All</option>
                                <?php
                            $taxonomy     = 'product_cat';
                            $orderby      = 'name';  
                            $show_count   = 0;      // 1 for yes, 0 for no
                            $pad_counts   = 0;      // 1 for yes, 0 for no
                            $hierarchical = 0;      // 1 for yes, 0 for no  
                            $title        = '';  
                            $empty        = 0;
                        
                            $args = array(
                                'taxonomy'     => $taxonomy,
                                'orderby'      => $orderby,
                                'show_count'   => $show_count,
                                'pad_counts'   => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li'     => $title,
                                'hide_empty'   => $empty
                            );
                            
                            $all_categories = get_categories( $args );
                        foreach ($all_categories as $cat) {
                        echo ' <option value=".'.$cat->slug .'">'.$cat->name.'</option>';
                        } ?>
                            </select>
                        </div>

                    </div>
                    <div class="carrello">

                        <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                            $count = WC()->cart->cart_contents_count; ?><a class="cart-contents"
                            href="<?php echo wc_get_cart_url(); ?>"
                            title="<?php _e('View your shopping cart'); ?>"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/carrello.png" alt="">
                            <span class="cart-contents-count"><?php echo esc_html($count); ?></span>
                        </a><?php
                    } ?>

                    </div>
                </div>
        </div>

        <div class="products products-grid">
            <div class="stamp"></div>
            <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order' => 'ASC'
                    );
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <?php $product = wc_get_product( get_the_ID() ); /* get the WC_Product Object */ ?>
                    <div class="products-grid-item <?php $terms = get_the_terms( get_the_ID(), 'product_cat' );
                    foreach ($terms as $term) {
                        echo  $term->slug;
                    }?>">
                <a href="<?php the_permalink(); ?>"
                    class="<?php echo (!$product->is_in_stock()) ? 'sold-out' : 'in-stock';?>"><?php the_post_thumbnail('large'); ?></a>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <p>
                    <?php echo ( $product->is_in_stock() ) ? $product->get_price_html() : '<span class="sold-out-color">Sold out</span>';?>
                </p>
            </div>
                <?php endwhile;
                    } else {
                        echo __( 'No products found' );
                    }
                    wp_reset_postdata();
                ?>
            </div>
        <!--/.products-->

    </div>


</div> <!-- end #content -->
<div id="newsletter-block">
    <div class="newsletter-block-content">
        <h2>SUBSCRIBE</h2>
        <?php echo do_shortcode('[newsletter_signup_form id=1]'); ?>
    </div>
</div>
<?php get_footer(); ?>