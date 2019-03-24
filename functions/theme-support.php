<?php
	
// Adding WP Functions & Theme Support
function joints_theme_support() {

	add_theme_support( 'align-wide' );

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );
	
	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );
	
	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
	
	// Add HTML5 Support
	add_theme_support( 'html5', 
	         array( 
	         	'comment-list', 
	         	'comment-form', 
	         	'search-form', 
	         ) 
	);
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	// Adding post format support
	 add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	); 
	
	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );	
	
} /* end theme support */

add_action( 'after_setup_theme', 'joints_theme_support' );

add_filter( 'single_template', function ( $template )
{
    // Get the current single post object
    $post = get_queried_object();
    // Set our 'constant' folder path
    $path = 'single/';

    // Set our variable to hold our templates
    $templates = [];

    // Lets handle the custom post type section
    if ( 'post' !== $post->post_type ) {
        $templates[] = $path . 'single-' . $post->post_type . '-' . $post->post_name . '.php';
        $templates[] = $path . 'single-' . $post->post_type . '.php';
    }

    // Lets handle the post post type stuff
    if ( 'post' === $post->post_type ) {
        // Get the post categories
        $categories = get_the_category( $post->ID );
        // Just for incase, check if we have categories
        if ( $categories ) {
            foreach ( $categories as $category ) {
                // Create possible template names
                $templates[] = $path . 'single-cat-' . $category->slug . '.php';
                $templates[] = $path . 'single-cat-' . $category->term_id . '.php';
            } //endforeach
        } //endif $categories
    } // endif  

    // Set our fallback templates
    $templates[] = $path . 'single.php';
    $templates[] = $path . 'default.php';
    $templates[] = 'index.php';

    /**
     * Now we can search for our templates and load the first one we find
     * We will use the array ability of locate_template here
     */
    $template = locate_template( $templates );

    // Return the template rteurned by locate_template
    return $template;
});


// Disalbe access to author page
add_action('template_redirect', 'my_custom_disable_author_page');

function my_custom_disable_author_page() {
	global $wp_query;

	if ( is_author() ) {
		$wp_query->set_404();
		status_header(404);
		// Redirect to homepage
		// wp_redirect(get_option('home'));
	}
}

// redirect events to upcoming show
add_action( 'template_redirect', 'redirect_to_upcomingshow' );

function redirect_to_upcomingshow() {
    if ( is_page('events') ) {
        wp_redirect( 'http://dirtymondays.com/upcoming-show/', 301 ); 
        exit;
    }
}