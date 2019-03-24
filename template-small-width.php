<?php
/*
Template Name: small Width
*/

get_header(); ?>
			
            <div class="page-content ">

            <div class="small-content">
	
            
        
                <main class="main " role="main">
                    
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
                        <header class="article-header">	
                           
                        </header> <!-- end article header -->
                                        
                        <section class="entry-content" itemprop="text">
                            <?php the_post_thumbnail('full'); ?>
                            <?php the_content(); ?>
                        </section> <!-- end article section -->
                                            
                        <footer class="article-footer">
                            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
                        
                        </footer> <!-- end article footer -->
                                            
                             
                                                                        
                    </article> <!-- end article -->
                        
                    <?php endwhile; endif; ?>							

                </main> <!-- end #main -->
                
          
	
	    </div> <!-- end #content -->
    </div>

<?php get_footer(); ?>