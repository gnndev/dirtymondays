<?php
/**
 * Block Name: carousel
 *
 * This is the template that displays carousel with block
 */

 // create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
 ?>

 <div class="grid-container block-carousel <?php echo $align_class; ?>">
 <div class="slick-carousel">
  


    <?php

    // check if the repeater field has rows of data
    if( have_rows('carousel') ):

        // loop through the rows of data
        while ( have_rows('carousel') ) : the_row(); ?>
    
        <div class="single-slide">
            <a target="_blank" href="<?php the_sub_field('link'); ?>"><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
            <h4><?php the_sub_field('title'); ?></h4>
            <p><?php the_sub_field('subtitle'); ?></p>
            </a>
        </div>

        <?php endwhile;

    else :

        // no rows found

    endif;

    ?>
    </div>
</div>
				
				

