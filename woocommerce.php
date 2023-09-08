<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

<div class="page-content" id="dmwoo">

    <div class="content" id="woocommerce-content">

        <?php woocommerce_content(); ?>

    </div>


</div> <!-- end #content -->

<div id="newsletter-block">

    
        <?php //if single product page
        if (is_product()) {
            get_template_part('parts/content', 'mailchimp');
        } else
         echo '<div class="newsletter-block-content">' . do_shortcode('[ninja_form id=99]') .'</div>'; ?> 
    
</div>

<?php get_footer(); ?>