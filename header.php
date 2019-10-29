<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>
			<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|PT+Serif:400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>

			
	<body <?php body_class(); ?>>

			<div id="header-mobile" class="hide-for-large">
					
					<div class="close-menu">
						<?php if(is_singular('dm_event')) { ?>
							<a href="<?php echo home_url(); ?>/upcoming-show/"><i class="fas fa-times"></i></a>
						<?php }	else { ?>		
							<a href="<?php echo home_url(); ?>"><i class="fas fa-times"></i></a>
						<?php } ?>
					</div>

					<nav class="nav-collapse">
						<?php joints_top_nav(); ?>	
					</nav>
					<div class="logo-mobile"><?php if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					} ?></div>

				</div>
	
			<header class="header wrapper show-for-large" role="banner">
				<div class="logo">
					<?php if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					} ?>
				</div>
			
				<div class="nav-menu show-for-large"><?php joints_top_nav(); ?></div>
				
	
			</header> <!-- end .header -->