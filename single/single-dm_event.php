<?php
/**
 * The template for displaying all single events
 */

get_header(); ?>
			
	<div class="page-content small-content">
	
		    <main class="main" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'parts/loop', 'event' ); ?>
					
				<?php endwhile; endif; ?>							

			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->
	


<?php get_footer(); ?>