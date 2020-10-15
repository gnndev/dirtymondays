<?php
/*
 * Template Name: Video article
 * Template Post Type: post
 */

get_header(); ?>
			
<div class="small-content single-article" id="single-video-post">

		<main class="main " role="main">
		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
                  <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                        <div class="grid-x grid-padding-x grid-padding-y grid-margin-x">
                            <div class="cell small-12 medium-12 text-center">
                                <h4 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h4>
                                <div class="video-inner-content">
                                    <?php the_content(); ?>
                                </div>
                               
                                <div class="text-center">
                                    <div class="hollow button see-more-btn"><a href="<?php echo site_url(); ?>/videos">MORE VIDEOS</a></div>
                                </div>
                            </div>                            
                        </div>
						                                                                        
                    </article> <!-- end article -->
		    	
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->


</div> <!-- end #content -->

<?php get_footer(); ?>