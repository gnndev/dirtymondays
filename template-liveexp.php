<?php
/*
Template Name: live exp
*/

get_header(); ?>

<main class="main" role="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="page-popup">
<div class="logo-popup show-for-medium"><?php if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					} ?></div>
    
<article id="post-<?php the_ID(); ?>" <?php post_class('nicescroll'); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

						
					
    <section class="entry-content" itemprop="text">
	    <?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		 
	</footer> <!-- end article footer -->
						    
					
</article> <!-- end article -->

</div>						
<?php endwhile; endif; ?>	                     
</main> <!-- end #main -->

<div class="bg-slider">
	<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
		<div class="orbit-wrapper">
			<div class="orbit-controls">
				<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><i class="fas fa-chevron-left"></i></button>
				<button class="orbit-next"><span class="show-for-sr">Next Slide</span><i class="fas fa-chevron-right"></i></button>
			</div>
			
			<?php 

			$images = get_field('le_gallery');
			$size = 'full';

			if( $images ): ?>
				<ul class="orbit-container">
					<?php foreach( $images as $image ): ?>

					<li class="is-active orbit-slide">
						<figure class="orbit-figure">
							<img src="<?php echo $image['url']; ?>" alt="live experience">
						</figure>
					</li>
	
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
				
				
		</div>

	</div>
</div>


<?php get_footer(); ?>