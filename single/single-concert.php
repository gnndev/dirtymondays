<?php

/**
 * The template for displaying all single events
 */
$args = array(
    'post_type' => 'concert',
    'post_status' => 'publish',
    'posts_per_page' =>  3,
    'meta_key' => 'event_date', // name of custom field
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

<div class="page-content small-content">

    <main class="main" role="main">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php get_template_part('parts/loop', 'concert'); ?>

        <?php endwhile;
        endif; ?>

    </main> <!-- end #main -->

</div> <!-- end #inner-content -->

<section class="upcoming">

    <div class="content">
        <a href="">
            <h2>UPCOMING CONCERTS
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                </svg>
            </h2>
        </a>
        <div class="grid-x grid-margin-x grid-margin-y upcoming-slider">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="cell medium-4 ">
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
            <?php endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>

    <?php get_footer(); ?>