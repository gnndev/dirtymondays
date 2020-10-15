<?php
/*
Template Name: More videos
*/

get_header(); ?>
			
            <div id="more-videos" class="page-content ">

            <div class="small-content">
	
            
        
                <main class="main " role="main">
                    <div class="grid-x grid-padding-x grid-padding-y">
                    <?php
                    
                    $args = array(
                        'post_type' => 'post',
                        'category_name' => 'video'
                    );
                    $query = new WP_Query( $args );


                                        // Il Loop
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                       <div class="cell small-12 medium-6">
                           <div class="video box">
                               <a class="video-link" href="<?php the_permalink();?>">
                                <?php the_post_thumbnail('large'); ?>
                                <span class="video-caption"><?php the_title();?></span>
                                </a>
                           </div>
                       </div>
                    <?php endwhile;

                    // Ripristina Query & Post Data originali
                    wp_reset_query();
                    wp_reset_postdata();
                    
                    
                    ?>				
                    </div>
                </main> <!-- end #main -->
                
          
	
	    </div> <!-- end #content -->
    </div>

<?php get_footer(); ?>