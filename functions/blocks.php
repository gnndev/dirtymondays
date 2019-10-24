<?php 
add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'home-video',
			'title'				=> __('Home video'),
			'description'		=> __('background video form homepage'),
            'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'video-alt3',
			'keywords'			=> array( 'video', 'dirtymondays' ),
        ));
        
        acf_register_block(array(
			'name'				=> 'events',
			'title'				=> __('Events'),
			'description'		=> __('Events list'),
            'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'calendar-alt',
			'keywords'			=> array( 'events', 'dirtymondays' ),
		));

		acf_register_block(array(
			'name'				=> 'newsletter',
			'title'				=> __('Newsletter'),
			'description'		=> __('subscrive block'),
            'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'email-alt',
			'keywords'			=> array( 'newsletter', 'dirtymondays' ),
		));

		acf_register_block(array(
			'name'				=> 'shop-video',
			'title'				=> __('Shop video'),
			'description'		=> __('shop video'),
            'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'video-alt3',
			'keywords'			=> array( 'video', 'dirtymondays' ),
		));
		
		acf_register_block(array(
			'name'				=> 'tabs',
			'title'				=> __('Tabs'),
			'description'		=> __('tabs'),
            'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'clipboard',
			'keywords'			=> array( 'tabs', 'dirtymondays' ),
		));
		
		acf_register_block(array(
			'name'				=> 'slider',
			'title'				=> __('Slider'),
			'description'		=> __('slider with content'),
            'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'clipboard',
			'keywords'			=> array( 'slider', 'dirtymondays' ),
		));
		
		acf_register_block(array(
			'name'				=> 'grid',
			'title'				=> __('Grid'),
			'description'		=> __('content grid'),
            'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'clipboard',
			'keywords'			=> array( 'grid', 'dirtymondays' ),
		));
		
		acf_register_block(array(
			'name'				=> 'full-title',
			'title'				=> __('Full title'),
			'description'		=> __('title with background'),
            'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'clipboard',
			'keywords'			=> array( 'grid', 'dirtymondays' ),
		));
		
		acf_register_block(array(
			'name'				=> 'carousel',
			'title'				=> __('Carousel'),
			'description'		=> __('carousel'),
            'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'clipboard',
			'keywords'			=> array( 'carousel', 'dirtymondays' ),
        ));
	}
}

function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/parts/blocks/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/parts/blocks/content-{$slug}.php") );
	}
}