<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
		<div id="footer-widget" class="content">
			<div class="grid-x">
				<div class="cell small-12 medium-2">

					<?php if ( is_active_sidebar( 'footer1' ) ) : ?>

					<?php dynamic_sidebar( 'footer1' ); ?>

					<?php endif; ?>

				</div>
				<div class="cell small-12 medium-2">

					<?php if ( is_active_sidebar( 'footer2' ) ) : ?>

					<?php dynamic_sidebar( 'footer2' ); ?>

					<?php endif; ?>

				</div>
				<div class="cell small-12 medium-2">

					<?php if ( is_active_sidebar( 'footer3' ) ) : ?>

					<?php dynamic_sidebar( 'footer3' ); ?>

					<?php endif; ?>

				</div>
				<div class="cell small-12 medium-6 text-right">

					<?php if ( is_active_sidebar( 'footer4' ) ) : ?>

					<?php dynamic_sidebar( 'footer4' ); ?>

					<?php endif; ?>

				</div>
			</div>
		</div>

		<footer class="footer text-center" role="contentinfo">
			<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
			
		</footer> <!-- end .footer -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->