<?php
/**
 * Template part for displaying a single event
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="article-header negative-margin">	
		<?php  the_post_thumbnail('full'); ?>
		<?php
			$field = get_field_object( 'fuso_orario', get_the_ID() );
			$value = $field['value'];
			$label = $field['choices'][ $value ];
		?>
		<p class="entry-title single-title text-uppercase" itemprop="headline"><?php echo DateTime::createFromFormat('Ymd', get_field('event_date'))->format('M jS, Y'); ; ?> | <?php echo get_field('event_location'); ?></p>
		<h2><?php the_title(); ?></h2>
		<?php echo (get_field('event_subtitle')) ? '<h4>' .get_field('event_subtitle') . '</h4>' : ''; ?>
    </header> <!-- end article header -->
					
    <section class="entry-content" itemprop="text">
		<?php the_content(); ?>

		<a class="btn-concert" href="<?php echo get_field('buy_ticket_link'); ?>" class="btn" target="_blank">Buy tickets</a>
	</section> <!-- end article section -->
	
						
	<footer class="article-footer">
		
	</footer> <!-- end article footer -->
	
													
</article> <!-- end article -->