<?php
/**
 * Block Name: Grid
 *
 * This is the template that displays the grid
 */

$align_class = $block['align'] ? 'align' . $block['align'] : '';
 ?>

<div class="grid-block <?php echo $align_class; ?>">
    <div class="grid-x" data-equalizer data-equalize-on="medium">
        <?php

                // check if the repeater field has rows of data
                if( have_rows('block_grid') ):
                    $count = 1;
                    // loop through the rows of data
                    while ( have_rows('block_grid') ) : the_row(); ?>

<?php if ( $count < 3 ) {
            $col = 6;
        } else {$col = 3;   }?>
     
        <div class="cell small-12 medium-<?php echo $col; ?> ">
    <?php if (get_sub_field('link')) : ?>  <a href="<?php  the_sub_field('link'); ?>"> <?php endif; ?>
           
                <div class="grid-item" data-equalizer-watch>
                    <div class="icon"><img src="<?php the_sub_field('image'); ?>">
                    <?php if ( $count < 3 ) : ?>
                  <div class="img-container">
                     <? else : ?></div>
                    <?php endif; ?>
                    <h3><?php  the_sub_field('title'); ?></h3>
                    <h4><?php  the_sub_field('subtitle'); ?></h4>
                    <?php  the_sub_field('content'); ?>
                    <?php if ( $count < 3 ) : ?>
                        </div> </div>
                    
                    <?php endif; ?>
                </div>
                <?php if (get_sub_field('link')) : ?> </a><?php endif; ?>
        </div>

        <?php 
        $count++;
        endwhile;

                else :

                    // no rows found

                endif;

                ?>
    </div>
</div>