<?php
/**
 * Block Name: Ful title
 *
 * This is the template that displays tabs content
 */

$align_class = $block['align'] ? 'align' . $block['align'] : '';
 ?>

 <div class="full-title <?php echo $align_class; ?>">
 <h2><?php the_field('ft_title'); ?></h2>
 </div>