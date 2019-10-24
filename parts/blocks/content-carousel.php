<?php
/**
 * Block Name: carousel
 *
 * This is the template that displays carousel with block
 */

 // create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
 ?>

 <div class=" block-carousel <?php echo $align_class; ?>">
 <div class="grid-container">
    <div class="block-header"><div class="block-title"><p ><?php the_field('carousel_block_title'); ?></p></div> <div class="block-link"><a href="<?php echo (wp_is_mobile()) ? get_field('carousel_block_url_mobile') : get_field('carousel_block_url'); ?>" target="_blank"><?php the_field('carousel_block_link'); ?> &rarr;</a></div> </div>
 
    <div class="slick-carousel">
  


    <?php

    // check if the repeater field has rows of data
    if( have_rows('carousel') ):

        // loop through the rows of data
        while ( have_rows('carousel') ) : the_row(); ?>
    
        <div class="single-slide">
            <a target="_blank" href="<?php echo (wp_is_mobile()) ? get_sub_field('mobile_link') : get_sub_field('link'); ?>"><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
            <h4><?php the_sub_field('title'); ?></h4>
            <p class="subtitle"><?php the_sub_field('subtitle'); ?></p>
            </a>
        </div>

        <?php endwhile;

    else :

        // no rows found

    endif;

    ?>
    </div>
</div>
</div>
				
				

