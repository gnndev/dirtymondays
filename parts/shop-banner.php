<?php //if acf field option is true show banner
if (get_field('show_banner', 'option')) : ?>

<div class="show-banner">
    <div class="content">
        <p style="text-align:center">
            <?php the_field('banner_text', 'option'); ?>
        </p>
    </div>
</div>

<?php endif; ?>