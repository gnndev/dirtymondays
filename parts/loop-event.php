<?php
/**
 * Template part for displaying a single event
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="article-header">	
		<h1 class="entry-title single-title" itemprop="headline"><?php echo DateTime::createFromFormat('Ymd', get_field('event_date'))->format('M jS, Y'); ; ?> | <?php the_title(); ?></h1>
    </header> <!-- end article header -->
					
    <section class="entry-content" itemprop="text">
		<?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		
	</footer> <!-- end article footer -->
	
													
</article> <!-- end article -->