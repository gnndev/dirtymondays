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

		<div class="newsletter-block-content">
			<h2>SUBSCRIBE</h2>
			<?php echo do_shortcode('[newsletter_signup_form id=1]'); ?>
		</div>
</div>

<?php get_footer(); ?>