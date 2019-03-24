<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
			
	<div class="page-content">

		<div class="content">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>
			
		<?php endwhile; endif; ?>	
		
		</div>

	
	</div> <!-- end #content -->

<?php get_footer(); ?>