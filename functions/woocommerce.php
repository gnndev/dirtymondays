<?php


function dirtymondays_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
  
}

add_action( 'after_setup_theme', 'dirtymondays_add_woocommerce_support' );

function my_header_add_to_cart_fragment($fragments)
{
    ob_start();
    $count = WC()->cart->cart_contents_count; ?><a class="bag-icon cart-contents"
    href="<?php echo wc_get_cart_url(); ?>"
    title="<?php _e('View your shopping cart'); ?>"><div class="xoo-wsch-basket" style="position:relative"><?php
					$count = WC()->cart->cart_contents_count; ?> 
						<span class="xoo-wscb-icon xoo-wsc-icon-bag2"></span>
							<span class="xoo-wscb-count"><?php echo esc_html($count); ?></span>
					
					</div>
    </a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment');



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
    <a href="#">SIZE CHART</a>
    <ul class="menu vertical nested">
 <?php the_field('pr_size_cart', get_the_ID()) ;?>
      
    </ul>
  </li>
</ul>
	
</div>
<?php endif; ?>
<?php }


add_action('woocommerce_add_to_cart_redirect ', 'resolve_dupes_add_to_cart_redirect');

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

//add_filter( 'woocommerce_add_to_cart_redirect', 'bbloomer_redirect_checkout_add_cart' );
 
function bbloomer_redirect_checkout_add_cart() {
   return wc_get_cart_url();
}

// Single variable produccts pages - Sold out functionality
add_action( 'woocommerce_single_product_summary', 'replace_single_add_to_cart_button', 1 );
function replace_single_add_to_cart_button() {
    global $product;

    // For variable product types
    if( $product->is_type( 'variable' ) ) {
        $is_soldout = true;
        foreach( $product->get_available_variations() as $variation ){
            if( $variation['is_in_stock'] )
                $is_soldout = false;
        }
        if( $is_soldout ){
            remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
            //add_action( 'woocommerce_single_variation', 'sold_out_button', 20 );
        }
    }
}

// The sold_out button replacement
function sold_out_button() {
    global $post, $product;

    ?>
    <div class="woocommerce-variation-add-to-cart variations_button">
        <?php
            do_action( 'woocommerce_before_add_to_cart_quantity' );

            woocommerce_quantity_input( array(
                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
            ) );

            do_action( 'woocommerce_after_add_to_cart_quantity' );
        ?>
        <a class="single_sold_out_button button alt disabled wc-variation-is-unavailable"><?php _e( "Sold Out", "woocommerce" ); ?></a>
    </div>
    <?php
}

//remove stripe button on sigle page
add_filter( 'wc_stripe_hide_payment_request_on_product_page', '__return_true' );

//remove continue shopping
add_filter('wc_add_to_cart_message_html','remove_continue_shopping_button',10,2);

function remove_continue_shopping_button($message, $products) {
    if (strpos($message, 'Continue shopping') !== false) {
        return preg_replace('/<a.*<\/a>/m','', $message);
    } else {
        return $message;
    }
}



// define the wpo_wcpdf_invoice_title callback 
function filter_wpo_wcpdf_invoice_title( $var ) { 
    return __( 'Receipt/Proforma', 'woocommerce-pdf-italian-add-on' ); 
}; 
         
// add the filter 
add_filter( 'wpo_wcpdf_receipt_title', 'filter_wpo_wcpdf_invoice_title', 10, 1 ); 


/**
 * @snippet       Plus Minus Quantity Buttons @ WooCommerce Product Page & Cart
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 5
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
// -------------
// 1. Show plus minus buttons
  
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus">+</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus">-</button>';
}
  
// -------------
// 2. Trigger update quantity script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() && ! is_checkout() ) return;
    
   wc_enqueue_js( "   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   " );
}


/**
 * @snippet       Item Quantity Inputs @ WooCommerce Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 6
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
// ----------------------------
// Add Quantity Input Beside Product Name
   
add_filter( 'woocommerce_checkout_cart_item_quantity', 'bbloomer_checkout_item_quantity_input', 9999, 3 );
  
function bbloomer_checkout_item_quantity_input( $product_quantity, $cart_item, $cart_item_key ) {
   $product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
   $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
   if ( ! $product->is_sold_individually() ) {
      $product_quantity = woocommerce_quantity_input( array(
         'input_name'  => 'shipping_method_qty_' . $product_id,
         'input_value' => $cart_item['quantity'],
         'max_value'   => $product->get_max_purchase_quantity(),
         'min_value'   => '0',
      ), $product, false );
      $product_quantity .= '<input type="hidden" name="product_key_' . $product_id . '" value="' . $cart_item_key . '">';
   }
   return $product_quantity;
}
 
// ----------------------------
// Detect Quantity Change and Recalculate Totals
 
add_action( 'woocommerce_checkout_update_order_review', 'bbloomer_update_item_quantity_checkout' );
 
function bbloomer_update_item_quantity_checkout( $post_data ) {
   parse_str( $post_data, $post_data_array );
   $updated_qty = false;
   foreach ( $post_data_array as $key => $value ) {   
      if ( substr( $key, 0, 20 ) === 'shipping_method_qty_' ) {         
         $id = substr( $key, 20 );   
         WC()->cart->set_quantity( $post_data_array['product_key_' . $id], $post_data_array[$key], false );
         $updated_qty = true;
      }      
   }   
   if ( $updated_qty ) WC()->cart->calculate_totals();
}


// Add label to WooCommerce single product image using a filter
function add_label_to_product_image($image_html, $attachment_id) {
    $product_id = get_the_ID();
    $country_restriction_type = get_post_meta($product_id, '_fz_country_restriction_type', true);

    if ($country_restriction_type === 'specific' || $country_restriction_type === 'excluded') {
        $country = get_post_meta($product_id, '_restricted_countries')[0];
        $label = ($country_restriction_type === 'specific') ?  implode(', ', $country)  . ' only': 'not in '. implode(', ', $country);
        $label_html = '<span class="country-product-label">' . esc_html($label) . '</span>';
        $image_html = $label_html . $image_html;
    }

    return $image_html;
}
add_filter('woocommerce_single_product_image_thumbnail_html', 'add_label_to_product_image', 10, 2);


function remove_upsell_products() {
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
}
add_action('woocommerce_after_single_product_summary', 'remove_upsell_products', 15);
