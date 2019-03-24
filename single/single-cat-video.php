<?php
/*
 * Template Name: Video article
 * Template Post Type: post
 */

get_header(); ?>
			
<div class="content single-article" id="single-video-post">

		<main class="main " role="main">
		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
                  <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                        <div class="grid-x grid-pdding-x grid-padding-y grid-margin-x">
                            <div class="cell small-12 medium-8">
                                <?php the_content(); ?>
                            </div>


                            <div class="cell small-12 medium-4 single-video-content">
                                <h4 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h4>
                                <div class="more-videos"><a href="<?php echo site_url(); ?>/videos">MORE VIDEO</a></div>
                            </div>

                            
                        </div>
						
                                                                        
                    </article> <!-- end article -->
		    	
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->


</div> <!-- end #content -->

<?php get_footer(); ?>