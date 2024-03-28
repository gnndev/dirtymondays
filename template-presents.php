<?php
/*
Template Name: Presents
*/
$args = array(
  'post_type' => 'concert',
  'post_status' => 'publish',
  'posts_per_page' =>  9,
  'meta_key' => 'event_date',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'meta_query' => array(
    array(
      'key' => 'event_date',
      'value' => date('Ymd'),
      'compare' => '>=',
      'type' => 'DATE'
    )
  ),
);
$the_query = new WP_Query($args);
get_header('presents'); ?>
<div class="content">
  <section style="margin-top:100px">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dm-concerts.jpg" alt="Logo">
  </section>

  <section>
    <div class="concerts-slider">

      <?php 
      $counter = 0;
      while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="concert-slide">
          <div class="grid-x grid-margin-x align-middle">
            <div class="cell medium-6 small-order-2 medium-order-1">
              <p><?php echo DateTime::createFromFormat('Ymd', get_field('event_date'))->format('d.m.Y'); ?> <span><?php echo get_field('event_location'); ?></span></p>
              <h3><?php the_title(); ?></h3>
              <?php echo (get_field('event_subtitle')) ? '<h4>' . get_field('event_subtitle') . '</h4>' : ''; ?>
              <a class="btn-concert" href="<?php echo get_field('buy_ticket_link'); ?>">Buy tickets</a>
            </div>
            <div class="cell medium-6 small-order-1 medium-order-2">
              <?php the_post_thumbnail('full'); ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
  </section>


  <?php if ($the_query->have_posts()) : ?>
    <section class="upcoming">
      <h2>UPCOMING CONCERTS</h2>
      <div class="grid-x grid-margin-x grid-margin-y">
        <?php while ($the_query->have_posts()) : $the_query->the_post(); 
         if ($counter >= 3) break;
         ?>
          <div class="cell medium-4">
            <div>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full'); ?>
              </a>
              <p><?php echo DateTime::createFromFormat('Ymd', get_field('event_date'))->format('d.m.Y'); ?> <span><?php echo get_field('event_location'); ?></span></p>
              <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
              </a>
              <?php echo (get_field('event_subtitle')) ? '<h4>' . get_field('event_subtitle') . '</h4>' : ''; ?>
              <a class="btn-concert" href="<?php echo get_field('buy_ticket_link'); ?>">Buy tickets</a>
            </div>
          </div>
        <?php
        
      endwhile;
        wp_reset_postdata();
        ?>
      </div>
    </section>
  <?php endif; ?>


</div>








<?php get_footer(); ?>