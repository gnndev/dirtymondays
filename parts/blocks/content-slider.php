<?php
/**
 * Block Name: slider
 *
 * This is the template that displays slider with block
 */

 // create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
 ?>

 <div class="block-slider <?php echo $align_class; ?>">

 <div class="slider-bg">
	<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
		<div class="orbit-wrapper">
			<div class="orbit-controls">
				<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><i class="fas fa-chevron-left"></i></button>
				<button class="orbit-next"><span class="show-for-sr">Next Slide</span><i class="fas fa-chevron-right"></i></button>
			</div>
			
			<?php 

			$images = get_field('block_slider_gallery');
			$size = 'full';

			if( $images ): ?>
				<ul class="orbit-container">
					<?php foreach( $images as $image ): ?>

					<li class="is-active orbit-slide">
						<figure class="orbit-figure">
							<img src="<?php echo $image['url']; ?>" alt="live experience">
						</figure>
					</li>
	
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
				
				
		</div>

	</div>
</div>
<div class="slider-wrapper">
    <div class="slider-content">
        <?php the_field('block_slider_content');?>
    </div>
</div>


 </div>