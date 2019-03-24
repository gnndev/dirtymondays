
<?php
/**
 * Block Name: Grid
 *
 * This is the template that displays the grid
 */

 ?>

        <div class="grid-x" data-equalizer data-equalize-on="medium">
                <?php

                // check if the repeater field has rows of data
                if( have_rows('block_grid') ):

                    // loop through the rows of data
                    while ( have_rows('block_grid') ) : the_row(); ?>

                    <div class="cell small-12 medium-3 ">
                        <a href="<?php  the_sub_field('link'); ?>"><div class="grid-item" data-equalizer-watch>
                            <div class="icon"><img src="<?php the_sub_field('image'); ?>"></div>
                                <h3><?php  the_sub_field('title'); ?></h3>
                                <h4><?php  the_sub_field('subtitle'); ?></h4>
                                <?php  the_sub_field('content'); ?>
                            </div>
                        </a>
                    </div>
                    
                    <?php endwhile;

                else :

                    // no rows found

                endif;

                ?>
        </div>