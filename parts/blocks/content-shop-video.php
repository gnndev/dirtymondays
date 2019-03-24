<?php
/**
 * Block Name: Shop-video
 *
 * This is the template that displays shop video
 */

 ?>
<div class="player" data-property="{videoURL:'<?php the_field('block_vl_youtube_code'); ?>',containment:'#shopbg',autoPlay:true, showControls:false, showYTLogo:false, mute:true, startAt:0, opacity:1, quality:'highres'}">
</div>
<a target="_blank" href="<?php the_field('block_vl_link'); ?>">
<div id="shopbg">
    <div class="shop-block-content">
        <?php if (get_field('block_vl_img')) : ?>
        <img src="<?php the_field('block_vl_img');?>" alt="dirty's">
        <?php endif; ?>
    <h3><?php the_field('block_vl_text');?></h3>
    </div>

</div>	
</a>