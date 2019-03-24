<?php
/**
 * Block Name: Home-Video
 *
 * This is the template that displays a video bg
 */

 ?>
<div class="player" data-property="{videoURL:'<?php the_field('block_youtube_code'); ?>',containment:'#videobg',autoPlay:true, showControls:false, showYTLogo:false, mute:true, startAt:0, opacity:1, quality:'highres', anchor: 'bottom,center'}">
</div>
<div id="videobg" <?php if(get_field('block_youtube_cover')): ?>style="background-image:url(<?php the_field('block_youtube_cover'); ?>);"<?php endif; ?>>
    <?php if(!get_field('block_youtube_cover')): ?>
    <div class="spinner"><i class="fas fa-spinner fa-spin  fa-4x"></i></div>
    <?php endif; ?>
    <div class="arrow">
    <a href="#events-container" data-smooth-scroll>
    <span></span>
    <span></span>  
    </a>
    </div>
</div>	