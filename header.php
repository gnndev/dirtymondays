<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">

    <!-- Force IE to use the latest rendering engine available -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta class="foundation-mq">
    <title> <?php wp_title('', true,''); ?> </title>

    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
    <!-- Icons & Favicons -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png"
        rel="apple-touch-icon" />
    <?php } ?>
    <link
        href="https://fonts.googleapis.com/css2?family=Antonio:wght@500;700&family=Oswald:wght@400;500;700&family=PT+Serif:ital,wght@0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>


</head>


<body <?php body_class(); ?>>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <?php joints_top_nav(); ?>
    </div>


    <div id="header-mobile" class="hide-for-large">

        <div class="logo-mobile"><?php if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					} ?></div>

        <a class="bag-icon cart-contents" href="<?php echo wc_get_cart_url(); ?>"
            title="<?php _e('View your shopping cart'); ?>">
            <div class="xoo-wsch-basket" style="position:relative"><?php
						$count = WC()->cart->cart_contents_count; ?>
                <span class="xoo-wscb-icon xoo-wsc-icon-bag2"></span>
                <span class="xoo-wscb-count"><?php echo esc_html($count); ?></span>

            </div>
        </a>

        <span onclick="openNav()"><i class="fa fa-bars"></i></span>

    </div>

    <header class="header wrapper show-for-large" role="banner">
        <div class="logo">
            <?php if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					} ?>
        </div>
        <a class="bag-icon cart-contents" href="<?php echo wc_get_cart_url(); ?>"
            title="<?php _e('View your shopping cart'); ?>">
            <div class="xoo-wsch-basket" style="position:relative"><?php
					$count = WC()->cart->cart_contents_count; ?>
                <span class="xoo-wscb-icon xoo-wsc-icon-bag2"></span>
                <span class="xoo-wscb-count"><?php echo esc_html($count); ?></span>

            </div>
        </a>
        <div class="nav-menu show-for-large"><?php joints_top_nav(); ?></div>


    </header> <!-- end .header -->

    <?php get_template_part( 'parts/shop', 'banner' ); ?>