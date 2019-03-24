<?php
/**
 * Block Name: tabs
 *
 * This is the template that displays tabs content
 */

 ?>
 <?php
// check if the repeater field has rows of data
if( have_rows('block_tabs') ): ?>

    <ul class="tabs" data-tabs id="dm-tabs">
     <?php 
     $count = 1; 
    while ( have_rows('block_tabs') ) : the_row(); ?> 
        <li class="tabs-title <?php echo ($count === 1 ) ? 'is-active' : '' ;?>"><a href="#panel<?php echo $count;?>" aria-selected="true"><?php the_sub_field('tab_title'); ?></a></li>
        <?php 
        $count++;
    endwhile; ?>
    </ul> 

     <div class="tabs-content" data-tabs-content="dm-tabs">
        <?php
        $countpanel = 1;
            while ( have_rows('block_tabs') ) : the_row(); ?> 
            <div class="tabs-panel <?php echo ( $countpanel === 1 ) ? 'is-active' : '' ;?>" id="panel<?php echo $countpanel;?>">

            <?php the_sub_field('content'); ?>
            </div>
        <?php 
     $countpanel++;
     endwhile; ?>
    </div>

<?php endif;

?>