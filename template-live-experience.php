<?php
/*
Template Name: live experience
*/

get_header(); ?>

<main class="main" role="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="live">
    
<article id="post-<?php the_ID(); ?>" <?php post_class('nicescroll'); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<div class="grid-container">				
					
    <section class="entry-content" itemprop="text">
	    <?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		 
	</footer> <!-- end article footer -->
	</div>						    
					
</article> <!-- end article -->

</div>						
<?php endwhile; endif; ?>	                     
</main> <!-- end #main -->


<?php get_footer(); ?>