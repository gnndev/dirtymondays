<?php
/**
 * Block Name: Events
 *
 * This is the template that displays the events list
 */
 ?>
<div id="events-container">

    <h2 class="livefast"><img src="<?php echo get_template_directory_uri() ?>/assets/images/live-fast.png" alt="live fast die dirty"></h2>
 <div id="event-block" class="content">
    <h2>UPCOMING SHOWS</h2>

            <?php 
            $events_num = get_field('block_display_events'); // prende il numro di eventi da mostrare nel blocco da acf
            $today = date('Ymd');

                $args= array(
                    'post_type' => 'dm_event',
                    'posts_per_page' =>  $events_num,
                    'meta_key' => 'event_date', // name of custom field
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_date',
                            'compare' => '>=',
                            'value' => $today,
                        )
                    )
                        );

            $the_query = new WP_Query( $args );
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="grid-x grid-padding-x block-event-single">
                <div class="cell small-12 medium-2 block-event-field block-event-date"><?php the_field('event_date', get_the_ID()); ?></div>
                <div class="cell small-12 medium-3 block-event-field block-event-title"><?php the_title(); ?></div>  
                <div class="cell small-12 medium-4 block-event-field block-event-desc"><?php the_field('event_location', get_the_ID()); ?></div>  
                <div class="cell small-12 medium-3 block-event-field block-event-btn">
                    <?php if (get_field('event_rsvp', get_the_ID())) : ?> 
                    <button class="hollow button rsvp-btn load" data-url="<?php the_field('event_rsvp', get_the_ID()); ?>" >RSVP</a>
                    <?php endif; ?>

                    <button class="hollow button rsvp-btn load" data-url="<?php the_permalink(); ?>">ABOUT</a>
                    
                </div>         
    
            </div>

            <?php 
            endwhile;

            wp_reset_postdata(); ?>

            <?php if( $events_num > 0) : ?>
            <div class="see-more">
                <a class="hollow button see-more-btn" href="<?php echo home_url(); ?>/upcoming-show/">SEE MORE</a>
            </div>
        <?php endif; ?>


    </div>
</div>
<div id="overlay-container">
<div id="hide"><i class="close-icon fas fa-times"></i></div>
<div id="overlay"><div class="spinner text-center"><i class="fas fa-spinner fa-spin  fa-4x"></i></div></div>

</div>
