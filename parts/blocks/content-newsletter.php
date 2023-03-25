<?php
/**
 * Block Name: Home-newsletter
 *
 * This is the template that displays newsletter box
 */

 // create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

 ?>
<div id="newsletter-block" class="<?php echo $align_class; ?>">

    <div class="newsletter-block-content">
        <h2>SUBSCRIBE</h2>
        <?php echo do_shortcode('[ninja_form id=99]'); ?>
    </div>
</div>