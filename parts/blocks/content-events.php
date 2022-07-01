<?php
/**
 * Block Name: Events
 *
 * This is the template that displays the events list
 */
 ?>
<div id="events-container">
    <h2 class="livefast"><img src="<?php echo get_template_directory_uri() ?>/assets/images/live-fast.png" alt="live fast die dirty"></h2>
    <div id="event-block" class="event-block">
        <h2>UPCOMING SHOWS</h2>
        <?php 
        $events_num = get_field('block_display_events'); // prende il numro di eventi da mostrare nel blocco da acf
        $args= array(
            'post_type' => 'dm_event',
            'posts_per_page' =>  -1,
            'meta_key' => 'event_date', // name of custom field
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            // 'meta_query' => array(
            //     array(
            //         'key' => 'event_date',
            //         'compare' => '>=',
            //         'value' => $today,
            //     )
            // )
                );

        $the_query = new WP_Query( $args );
        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
       
            <?php 
            $event_date = new DateTime(get_field('event_date', get_the_ID()), new DateTimeZone('Europe/Rome') );
            $timestamp = $event_date->add(new DateInterval("PT23H"))->format('YmdH') ;
            $today = new DateTime("now", new DateTimeZone('Europe/Rome') ); 
            if('LosAngeles' == get_field('fuso_orario', get_the_ID())) {
                $today_timepstamp = $today->sub(new DateInterval("PT9H"))->format('YmdH') ;
            } else {
                $today_timepstamp = $today->format('YmdH');
            }
            if( $timestamp >= $today_timepstamp ) : ?>
             <div class="grid-x grid-padding-x block-event-single">
                <div class="cell small-12 medium-3 block-event-field block-event-title">
                    <?php
                        $field = get_field_object( 'fuso_orario', get_the_ID() );
                        $value = $field['value'];
                        $label = $field['choices'][ $value ];
                        echo $label;
                    ?>
                </div>  
                <div class="cell small-12 medium-2 block-event-field block-event-date"><?php echo $event_date->format('M jS, Y') ?></div>
               
                <div class="cell small-12 medium-4 block-event-field block-event-desc"><?php the_field('event_location', get_the_ID()); ?></div>  
                <div class="cell small-12 medium-3 block-event-field block-event-btn">
                    <a class="rsvp button" href="<?php the_permalink(); ?>">RSVP</a>
                </div> 
            </div>
            <?php endif ;?>      
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
