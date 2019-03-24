<?php
/* joints Event Type Example
This page walks you through creating 
a Event type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/


// let's create the function for the custom type
function custom_event() { 
	// creating (registering) the custom type 
	register_post_type( 'dm_event', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Events', 'dirtymondays'), /* This is the Title of the Group */
			'singular_name' => __('Event', 'dirtymondays'), /* This is the individual type */
			'all_items' => __('All Events', 'dirtymondays'), /* the all items menu item */
			'add_new' => __('Add New', 'dirtymondays'), /* The add new menu item */
			'add_new_item' => __('Add New Custom Type', 'dirtymondays'), /* Add New Display Title */
			'edit' => __( 'Edit', 'dirtymondays' ), /* Edit Dialog */
			'edit_item' => __('Edit Post Types', 'dirtymondays'), /* Edit Display Title */
			'new_item' => __('New Post Type', 'dirtymondays'), /* New Display Title */
			'view_item' => __('View Post Type', 'dirtymondays'), /* View Display Title */
			'search_items' => __('Search Post Type', 'dirtymondays'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'dirtymondays'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'dirtymondays'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example Event type', 'dirtymondays' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-calendar-alt', /* the icon for the Event type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'event', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'dm_event', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'),
			'show_in_rest'       => true
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your Event type */
	register_taxonomy_for_object_type('category', 'dm_event');
	/* this adds your post tags to your Event type */
	register_taxonomy_for_object_type('post_tag', 'dm_event');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_event');
