<?php
/**
 * Block Name: Upcoming Show
 *
 * This is the template that displays the events list
 */
 ?>
<div id="ups-container">

    <div id="ups-block" class="ups-block">
        <?php 
        $events_num = get_field('block_display_events'); // prende il numro di eventi da mostrare nel blocco da acf
        $args= array(
            'post_type' => 'dm_event',
            'posts_per_page' =>  -1,
            'meta_key' => 'event_date', // name of custom field
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
        );
        $count_div = 1;
        $the_query = new WP_Query( $args );
        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php 
            $event_date = new DateTime(get_field('event_date', get_the_ID()), new DateTimeZone('Europe/Rome') );
            $timestamp = $event_date->add(new DateInterval("PT23H"))->format('YmdH') ;
            $today = new DateTime("now", new DateTimeZone('Europe/Rome') ); 
            if('LosAngeles' == get_field('fuso_orario', get_the_ID())) {
                $today_timepstamp = $today->sub(new DateInterval("PT6H"))->format('YmdH') ;
              
            } else {
                $today_timepstamp = $today->format('YmdH');
            }
            
            if( $timestamp >= $today_timepstamp ) : ?>
        <div
            class="block-event-single <?php echo ('LosAngeles' == get_field('fuso_orario', get_the_ID())) ? 'odd' : 'even'; ?>">
            <div class="block-event-field block-event-img"
                style="background-image:url('<?php echo get_the_post_thumbnail_url( get_the_ID() ) ;?>'); ">
            </div>
            <div class="block-event-field block-event-title">
                <?php
                    $field = get_field_object( 'fuso_orario', get_the_ID() );
                    $value = $field['value'];
                    $label = $field['choices'][ $value ];
                ?>
                <h2><?php echo $label; ?></h2>
                <p><?php echo (get_field('event_type', get_the_ID())) ? get_field('event_type', get_the_ID()) : 'It\'s a party' ;?>
                </p>
            </div>
            <!-- mobile -->
            <div class="block-event-field block-event-title-mobile">
                <?php
                    $field = get_field_object( 'fuso_orario', get_the_ID() );
                    $value = $field['value'];
                    $label = $field['choices'][ $value ];
                ?>
                <h2><?php echo $label; ?></h2>
                <p class="type">
                    <?php echo (get_field('event_type', get_the_ID())) ? get_field('event_type', get_the_ID()) : 'It\'s a party' ;?>
                </p>
                <p class="date"><?php echo str_replace('-', '<br>', get_field('event_location', get_the_ID())) ;?></p>
            </div>
            <div class="block-event-field block-event-btn-mobile">
                <h2><?php echo $event_date->format('M jS') ?></h2>
                <div>
                    <a class="btn" href="<?php the_permalink(); ?>">RSVP</a>
                    <?php if(get_field('event_external_link',get_the_ID())) : ?>
                    <a class="btn" target="_blank"
                        href="<?php echo get_field('event_external_link' ,get_the_ID()); ?>">TIX
                    </a>

                    <?php endif;?>
                </div>

            </div>
            <!-- mobile -->
            <div class=" block-event-field block-event-date">
                <h2><?php echo $event_date->format('M jS') ?></h2>
                <p><?php the_field('event_location', get_the_ID()) ;?></p>
            </div>

            <div class="block-event-field block-event-btn">
                <a class="btn" href="<?php the_permalink(); ?>">RSVP</a>
                <?php if(get_field('event_external_link',get_the_ID())) : ?>
                <a class="btn" target="_blank" href="<?php echo get_field('event_external_link' ,get_the_ID()); ?>">TIX
                </a>

                <?php endif;?>

            </div>
            <?php if(get_field('event_is_live',get_the_ID())) : ?>
            <div class="is-live">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/LIVE.png" alt="live fast die dirty">
            </div>
            <?php endif ;?>
        </div>
        <?php endif ;?>
        <?php 
        $count_div++;
        endwhile;
        wp_reset_postdata(); ?>

    </div>
</div>