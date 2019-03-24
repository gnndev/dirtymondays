<?php
/**
 * The template for displaying all rsvp
 */

get_header(); ?>
			
	<div class="page-content ">

    <div class="small-content">
	
		    <main class="main" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'parts/loop', 'rsvp' ); ?>
					
				<?php endwhile; endif; ?>	
										

			</main> <!-- end #main -->
		    
		</div> <!-- end small-content -->
	
        </div>

<?php get_footer(); ?>