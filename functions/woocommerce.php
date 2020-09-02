<?php


function dirtymondays_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
  
}

add_action( 'after_setup_theme', 'dirtymondays_add_woocommerce_support' );

add_action( 'woocommerce_before_add_to_cart_button', 'dm_add_sizes_cart' );
 
function dm_add_sizes_cart(){ ?>
<?php if ( get_field('taglia_unica', get_the_ID()) ) :?>
  <div class="sizes-cart">
  <label for="">TAGLIA UNICA</label>
  </div>
  <?php endif; ?>
<?php if ( get_field('pr_show_sc', get_the_ID()) ) :?>
<div class="sizes-cart">
    <ul class="vertical menu accordion-menu" data-accordion-menu>
  <li>
    <a href="#">SIZE CART</a>
    <ul class="menu vertical nested">
 <?php the_field('pr_size_cart', get_the_ID()) ;?>
      
    </ul>
  </li>
</ul>
	
</div>
<?php endif; ?>
<?php }


add_action( 'woocommerce_before_single_product', 'dm_add_cart_to_single_product' );
 
function dm_add_cart_to_single_product(){ ?>
<div class="single-carrello">

<?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    $count = WC()->cart->cart_contents_count; ?><a class="cart-contents"
    href="<?php echo WC()->cart->get_cart_url(); ?>"
    title="<?php _e('View your shopping cart'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/carrello.png" alt="">
                        <span class="cart-contents-count"><?php echo esc_html($count); ?></span>
                        </a><?php
} ?>

</div>
    <?php
}

add_action('add_to_cart_redirect', 'resolve_dupes_add_to_cart_redirect');

function resolve_dupes_add_to_cart_redirect($url = false)
{

     // If another plugin beats us to the punch, let them have their way with the URL
    if (!empty($url)) {
        return $url;
    }

    // Redirect back to the original page, without the 'add-to-cart' parameter.
    // We add the `get_bloginfo` part so it saves a redirect on https:// sites.
    return get_bloginfo('wpurl').add_query_arg(array(), remove_query_arg('add-to-cart'));
}


// move price under description 
add_action('woocommerce_single_product_summary', 'move_single_product_price', 1);
function move_single_product_price() {
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 29);
}


add_action('template_redirect', 'dm_redirect_shop_page');
 function dm_redirect_shop_page() {
    if (is_shop()) {
      wp_redirect(home_url( 'shop' ));
       exit;
       } 
  }


  add_filter('woocommerce_default_address_fields', 'custom_default_address_fields', 20, 1);
function custom_default_address_fields( $address_fields ){
    
    if( ! is_cart()){ // <== On cart page only
        

        // Change class
        $address_fields['first_name']['class'] = array('form-row-first'); //  50%
        $address_fields['last_name']['class']  = array('form-row-last');  //  50%
        $address_fields['address_1']['class']  = array('form-row-wide');  // 100%
        $address_fields['state']['class']      = array('form-row-wide');  // 100%
        $address_fields['postcode']['class']   = array('form-row-first'); //  50%
        $address_fields['city']['class']       = array('form-row-last');  //  50%
    }
    return $address_fields;
}

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
  $fields['billing']['billing_email']['class'] = array('form-row-first'); //  50%
  $fields['billing']['billing_phone']['class']       = array('form-row-last');  //  50%

     return $fields;
}

add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_echo_qty_front_add_cart' );
 
function bbloomer_echo_qty_front_add_cart() {
 echo '<div class="qty-label"><label>QUANTITY </label></div>'; 
}

add_filter( 'woocommerce_cart_item_name', 'ts_product_image_on_checkout', 10, 3 );
 
function ts_product_image_on_checkout( $name, $cart_item, $cart_item_key ) {
     
    /* Return if not checkout page */
    if ( ! is_checkout() ) {
        return $name;
    }
     
    /* Get product object */
    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
 
    /* Get product thumbnail */
    $thumbnail = $_product->get_image();
 
    /* Add wrapper to image and add some css */
    $image = '<div class="ts-product-image" style="width: 150px; display: inline-block; padding-right: 7px; vertical-align: middle;">'
                . $thumbnail .
            '</div>'; 
 
    /* Prepend image to name and return it */
    return $image . $name;
}

add_filter( 'woocommerce_add_to_cart_redirect', 'bbloomer_redirect_checkout_add_cart' );
 
function bbloomer_redirect_checkout_add_cart() {
   return wc_get_cart_url();
}