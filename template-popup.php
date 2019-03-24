<?php
/*
Template Name: popup
*/

get_header(); ?>

<main class="main" role="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="page-popup">
    
<article id="post-<?php the_ID(); ?>" <?php post_class('nicescroll'); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
<div id="hide"><a href="<?php echo home_url(); ?>"><i class="close-icon fas fa-times"></i></a></div>
						
					
    <section class="entry-content" itemprop="text">
	    <?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		 
	</footer> <!-- end article footer -->
						    
					
</article> <!-- end article -->

</div>						
<?php endwhile; endif; ?>	                     
</main> <!-- end #main -->
			
<div class="player" data-property="{videoURL:'2yWAsmZuRYE', useOnMobile: false, containment:'body',autoPlay:true, showControls:false, showYTLogo:false, mute:true, startAt:0, opacity:1, quality:'highres'}">
</div>

<?php get_footer(); ?>